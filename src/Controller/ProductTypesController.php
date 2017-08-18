<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductTypes Controller
 *
 * @property \App\Model\Table\ProductTypesTable $ProductTypes
 *
 * @method \App\Model\Entity\ProductType[] paginate($object = null, array $settings = [])
 */
class ProductTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productTypes = $this->paginate($this->ProductTypes);

        $this->set(compact('productTypes'));
        $this->set('_serialize', ['productTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Products = $this->loadModel('Products');

        $productType = $this->ProductTypes->get($id);
        $products = $this->Products->find('all')->contain(['ProductTypes','MaterialTypes','Series','ProductOptions'])->where(['ProductTypes.Id'=>$id])->toArray();

        $this->set(compact('productType','products']));
        
        $this->set('_serialize', ['productType','products']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productType = $this->ProductTypes->newEntity();
        if ($this->request->is('post')) {
            $productType = $this->ProductTypes->patchEntity($productType, $this->request->getData());
            if ($this->ProductTypes->save($productType)) {
                $this->Flash->success(__('The product type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product type could not be saved. Please, try again.'));
        }
        $this->set(compact('productType'));
        $this->set('_serialize', ['productType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productType = $this->ProductTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productType = $this->ProductTypes->patchEntity($productType, $this->request->getData());
            if ($this->ProductTypes->save($productType)) {
                $this->Flash->success(__('The product type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product type could not be saved. Please, try again.'));
        }
        $this->set(compact('productType'));
        $this->set('_serialize', ['productType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productType = $this->ProductTypes->get($id);
        if ($this->ProductTypes->delete($productType)) {
            $this->Flash->success(__('The product type has been deleted.'));
        } else {
            $this->Flash->error(__('The product type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
