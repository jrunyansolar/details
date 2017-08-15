<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Testing Controller
 *
 *
 * @method \App\Model\Entity\Testing[] paginate($object = null, array $settings = [])
 */
class TestingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $testing = $this->paginate($this->Testing);

        $this->set(compact('testing'));
        $this->set('_serialize', ['testing']);
    }

    /**
     * View method
     *
     * @param string|null $id Testing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testing = $this->Testing->get($id, [
            'contain' => []
        ]);

        $this->set('testing', $testing);
        $this->set('_serialize', ['testing']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testing = $this->Testing->newEntity();
        if ($this->request->is('post')) {
            $testing = $this->Testing->patchEntity($testing, $this->request->getData());
            if ($this->Testing->save($testing)) {
                $this->Flash->success(__('The testing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testing could not be saved. Please, try again.'));
        }
        $this->set(compact('testing'));
        $this->set('_serialize', ['testing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Testing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testing = $this->Testing->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testing = $this->Testing->patchEntity($testing, $this->request->getData());
            if ($this->Testing->save($testing)) {
                $this->Flash->success(__('The testing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testing could not be saved. Please, try again.'));
        }
        $this->set(compact('testing'));
        $this->set('_serialize', ['testing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Testing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testing = $this->Testing->get($id);
        if ($this->Testing->delete($testing)) {
            $this->Flash->success(__('The testing has been deleted.'));
        } else {
            $this->Flash->error(__('The testing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
