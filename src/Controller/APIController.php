<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * API Controller
 *
 *
 * @method \App\Model\Entity\API[] paginate($object = null, array $settings = [])
 */
class APIController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $aPI = $this->paginate($this->API);

        $this->set(compact('aPI'));
        $this->set('_serialize', ['aPI']);
    }

    /**
     * View method
     *
     * @param string|null $id A P I id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aPI = $this->API->get($id, [
            'contain' => []
        ]);

        $this->set('aPI', $aPI);
        $this->set('_serialize', ['aPI']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aPI = $this->API->newEntity();
        if ($this->request->is('post')) {
            $aPI = $this->API->patchEntity($aPI, $this->request->getData());
            if ($this->API->save($aPI)) {
                $this->Flash->success(__('The a p i has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The a p i could not be saved. Please, try again.'));
        }
        $this->set(compact('aPI'));
        $this->set('_serialize', ['aPI']);
    }

    /**
     * Edit method
     *
     * @param string|null $id A P I id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aPI = $this->API->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aPI = $this->API->patchEntity($aPI, $this->request->getData());
            if ($this->API->save($aPI)) {
                $this->Flash->success(__('The a p i has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The a p i could not be saved. Please, try again.'));
        }
        $this->set(compact('aPI'));
        $this->set('_serialize', ['aPI']);
    }

    /**
     * Delete method
     *
     * @param string|null $id A P I id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aPI = $this->API->get($id);
        if ($this->API->delete($aPI)) {
            $this->Flash->success(__('The a p i has been deleted.'));
        } else {
            $this->Flash->error(__('The a p i could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
