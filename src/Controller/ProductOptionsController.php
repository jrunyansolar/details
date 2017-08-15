<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductOptions Controller
 *
 * @property \App\Model\Table\ProductOptionsTable $ProductOptions
 *
 * @method \App\Model\Entity\ProductOption[] paginate($object = null, array $settings = [])
 */
class ProductOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Options', 'Products']
        ];
        $productOptions = $this->paginate($this->ProductOptions);

        $this->set(compact('productOptions'));
        $this->set('_serialize', ['productOptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productOption = $this->ProductOptions->get($id, [
            'contain' => ['Options', 'Products']
        ]);

        $this->set('productOption', $productOption);
        $this->set('_serialize', ['productOption']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productOption = $this->ProductOptions->newEntity();
        if ($this->request->is('post')) {
            $productOption = $this->ProductOptions->patchEntity($productOption, $this->request->getData());
            if ($this->ProductOptions->save($productOption)) {
                $this->Flash->success(__('The product option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product option could not be saved. Please, try again.'));
        }
        $options = $this->ProductOptions->Options->find('list', ['limit' => 200]);
        $products = $this->ProductOptions->Products->find('list', ['limit' => 200]);
        $this->set(compact('productOption', 'options', 'products'));
        $this->set('_serialize', ['productOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productOption = $this->ProductOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productOption = $this->ProductOptions->patchEntity($productOption, $this->request->getData());
            if ($this->ProductOptions->save($productOption)) {
                $this->Flash->success(__('The product option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product option could not be saved. Please, try again.'));
        }
        $options = $this->ProductOptions->Options->find('list', ['limit' => 200]);
        $products = $this->ProductOptions->Products->find('list', ['limit' => 200]);
        $this->set(compact('productOption', 'options', 'products'));
        $this->set('_serialize', ['productOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productOption = $this->ProductOptions->get($id);
        if ($this->ProductOptions->delete($productOption)) {
            $this->Flash->success(__('The product option has been deleted.'));
        } else {
            $this->Flash->error(__('The product option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
