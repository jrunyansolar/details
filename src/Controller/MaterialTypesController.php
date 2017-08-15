<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialTypes Controller
 *
 * @property \App\Model\Table\MaterialTypesTable $MaterialTypes
 *
 * @method \App\Model\Entity\MaterialType[] paginate($object = null, array $settings = [])
 */
class MaterialTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $materialTypes = $this->paginate($this->MaterialTypes);

        $this->set(compact('materialTypes'));
        $this->set('_serialize', ['materialTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialType = $this->MaterialTypes->get($id, [
            'contain' => []
        ]);

        $this->set('materialType', $materialType);
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialType = $this->MaterialTypes->newEntity();
        if ($this->request->is('post')) {
            $materialType = $this->MaterialTypes->patchEntity($materialType, $this->request->getData());
            if ($this->MaterialTypes->save($materialType)) {
                $this->Flash->success(__('The material type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material type could not be saved. Please, try again.'));
        }
        $this->set(compact('materialType'));
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialType = $this->MaterialTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialType = $this->MaterialTypes->patchEntity($materialType, $this->request->getData());
            if ($this->MaterialTypes->save($materialType)) {
                $this->Flash->success(__('The material type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material type could not be saved. Please, try again.'));
        }
        $this->set(compact('materialType'));
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialType = $this->MaterialTypes->get($id);
        if ($this->MaterialTypes->delete($materialType)) {
            $this->Flash->success(__('The material type has been deleted.'));
        } else {
            $this->Flash->error(__('The material type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
