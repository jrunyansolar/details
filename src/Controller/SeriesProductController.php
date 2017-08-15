<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SeriesProduct Controller
 *
 * @property \App\Model\Table\SeriesProductTable $SeriesProduct
 *
 * @method \App\Model\Entity\SeriesProduct[] paginate($object = null, array $settings = [])
 */
class SeriesProductController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Series', 'Products']
        ];
        $seriesProduct = $this->paginate($this->SeriesProduct);

        $this->set(compact('seriesProduct'));
        $this->set('_serialize', ['seriesProduct']);
    }

    /**
     * View method
     *
     * @param string|null $id Series Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seriesProduct = $this->SeriesProduct->get($id, [
            'contain' => ['Series', 'Products']
        ]);

        $this->set('seriesProduct', $seriesProduct);
        $this->set('_serialize', ['seriesProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seriesProduct = $this->SeriesProduct->newEntity();
        if ($this->request->is('post')) {
            $seriesProduct = $this->SeriesProduct->patchEntity($seriesProduct, $this->request->getData());
            if ($this->SeriesProduct->save($seriesProduct)) {
                $this->Flash->success(__('The series product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The series product could not be saved. Please, try again.'));
        }
        $series = $this->SeriesProduct->Series->find('list', ['limit' => 200]);
        $products = $this->SeriesProduct->Products->find('list', ['limit' => 200]);
        $this->set(compact('seriesProduct', 'series', 'products'));
        $this->set('_serialize', ['seriesProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Series Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seriesProduct = $this->SeriesProduct->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seriesProduct = $this->SeriesProduct->patchEntity($seriesProduct, $this->request->getData());
            if ($this->SeriesProduct->save($seriesProduct)) {
                $this->Flash->success(__('The series product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The series product could not be saved. Please, try again.'));
        }
        $series = $this->SeriesProduct->Series->find('list', ['limit' => 200]);
        $products = $this->SeriesProduct->Products->find('list', ['limit' => 200]);
        $this->set(compact('seriesProduct', 'series', 'products'));
        $this->set('_serialize', ['seriesProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Series Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seriesProduct = $this->SeriesProduct->get($id);
        if ($this->SeriesProduct->delete($seriesProduct)) {
            $this->Flash->success(__('The series product has been deleted.'));
        } else {
            $this->Flash->error(__('The series product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
