<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MediaAttributes Controller
 *
 * @property \App\Model\Table\MediaAttributesTable $MediaAttributes
 *
 * @method \App\Model\Entity\MediaAttribute[] paginate($object = null, array $settings = [])
 */
class MediaAttributesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mediaAttributes = $this->paginate($this->MediaAttributes);

        $this->set(compact('mediaAttributes'));
        $this->set('_serialize', ['mediaAttributes']);
    }

    /**
     * View method
     *
     * @param string|null $id Media Attribute id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mediaAttribute = $this->MediaAttributes->get($id, [
            'contain' => []
        ]);

        $this->set('mediaAttribute', $mediaAttribute);
        $this->set('_serialize', ['mediaAttribute']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mediaAttribute = $this->MediaAttributes->newEntity();
        if ($this->request->is('post')) {
            $mediaAttribute = $this->MediaAttributes->patchEntity($mediaAttribute, $this->request->getData());
            if ($this->MediaAttributes->save($mediaAttribute)) {
                $this->Flash->success(__('The media attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('mediaAttribute'));
        $this->set('_serialize', ['mediaAttribute']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Media Attribute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mediaAttribute = $this->MediaAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mediaAttribute = $this->MediaAttributes->patchEntity($mediaAttribute, $this->request->getData());
            if ($this->MediaAttributes->save($mediaAttribute)) {
                $this->Flash->success(__('The media attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('mediaAttribute'));
        $this->set('_serialize', ['mediaAttribute']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Media Attribute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mediaAttribute = $this->MediaAttributes->get($id);
        if ($this->MediaAttributes->delete($mediaAttribute)) {
            $this->Flash->success(__('The media attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The media attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
