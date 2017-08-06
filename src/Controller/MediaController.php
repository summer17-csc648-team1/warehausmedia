<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;



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
        $user = $this->Auth->user();
        $this->set('userid', $user['UserID']);

        $category_array = array();
        //get Categories
        $categories = TableRegistry::get('Categories')->find('all');
        foreach ($categories as $category)
        {
            $category_array[$category->CategoryID] = $category->Category;
        }
        $this->set(compact('category_array'));

        $media = $this->Media->newEntity();

        if ($this->request->is('post')) {
            $media = $this->Media->patchEntity($media, $this->request->getData());
            $destination = 'Images/'; //webroot folder
            $filename = $media['upload']['name'];
            $filetype = $media['upload']['type'];
            if($filetype == 'image/jpg' || $filetype == 'image/jpeg' || $filetype == 'image/png'){
                if(move_uploaded_file($media['upload']['tmp_name'], WWW_ROOT.$destination.$filename)){
                $media->FileLocation = 'Images/'.$filename; //store reference in db
                $media->ThumbnailLocation = 'Images/'. 'Thumbnail-' . $filename;
                $media->Format = explode("/", $filetype)[1];
                $this->createThumbnail(WWW_ROOT  . $media->FileLocation,WWW_ROOT  . $media->ThumbnailLocation,180,180);
                
                }
                if ($this->Media->save($media)) {
                    $this->Flash->success(__('The media has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }else{
                    $this->Flash->error(__('The media could not be saved. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('Sorry, we only support .jpg and .png file types'));
            }
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
        $media = $this->Media->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media = $this->Media->patchEntity($media, $this->request->getData());
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
        $media = $this->Media->get($id);
        if ($this->Media->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
