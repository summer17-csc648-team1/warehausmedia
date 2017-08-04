<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Media Controller
 *
 * @property \App\Model\Table\MediaTable $Media
 *
 * @method \App\Model\Entity\Media[] paginate($object = null, array $settings = [])
 */
class MediaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $media = $this->paginate($this->Media);

        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $media = $this->Media->get($id, [
            'contain' => []
        ]);

        $this->set('media', $media);
        $this->set('_serialize', ['media']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $media = $this->Media->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            //Add UserID
            $data["Users_UserID"] = $this->Auth->user('UserID');

            $media = $this->Media->patchEntity($media, $data);

            if ($this->Media->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        Log::debug("About to edit " . $id);

        //Query for the correct MediaID
        if($id != null) {
            $media = $this
                ->Media
                ->find()
                ->where(['MediaID =' => $id])
                ->toArray()[0];
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //Add UserID
            $data["Users_UserID"] = $this->Auth->user('UserID');

            $media = $this->Media->patchEntity($media, $data);

            if ($this->Media->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        if($id != null) {
            $media = $this
                ->Media
                ->find()
                ->where(['MediaID =' => $id])
                ->toArray()[0];
        }

        if ($this->Media->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'add') {
            return true;
        }
        if ($this->request->getParam('action') === 'index') {
            return true;
        }
        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $MediaId = (int)$this->request->getParam('pass.0');
            Log::debug($MediaId . " " . $user['UserID']);
            if ($this->Media->isOwnedBy($MediaId, $user['UserID'])) {
                Log::debug("Getting here");
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
