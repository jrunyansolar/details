<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SeriesOptions Controller
 *
 * @property \App\Model\Table\SeriesOptionsTable $SeriesOptions
 *
 * @method \App\Model\Entity\SeriesOption[] paginate($object = null, array $settings = [])
 */
class SeriesOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Series', 'Options']
        ];
        $seriesOptions = $this->paginate($this->SeriesOptions);

        $this->set(compact('seriesOptions'));
        $this->set('_serialize', ['seriesOptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Series Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seriesOption = $this->SeriesOptions->get($id, [
            'contain' => ['Series', 'Options']
        ]);

        $this->set('seriesOption', $seriesOption);
        $this->set('_serialize', ['seriesOption']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seriesOption = $this->SeriesOptions->newEntity();
        if ($this->request->is('post')) {
            $seriesOption = $this->SeriesOptions->patchEntity($seriesOption, $this->request->getData());
            if ($this->SeriesOptions->save($seriesOption)) {
                $this->Flash->success(__('The series option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The series option could not be saved. Please, try again.'));
        }
        $series = $this->SeriesOptions->Series->find('list', ['limit' => 200]);
        $options = $this->SeriesOptions->Options->find('list', ['limit' => 200]);
        $this->set(compact('seriesOption', 'series', 'options'));
        $this->set('_serialize', ['seriesOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Series Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seriesOption = $this->SeriesOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seriesOption = $this->SeriesOptions->patchEntity($seriesOption, $this->request->getData());
            if ($this->SeriesOptions->save($seriesOption)) {
                $this->Flash->success(__('The series option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The series option could not be saved. Please, try again.'));
        }
        $series = $this->SeriesOptions->Series->find('list', ['limit' => 200]);
        $options = $this->SeriesOptions->Options->find('list', ['limit' => 200]);
        $this->set(compact('seriesOption', 'series', 'options'));
        $this->set('_serialize', ['seriesOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Series Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seriesOption = $this->SeriesOptions->get($id);
        if ($this->SeriesOptions->delete($seriesOption)) {
            $this->Flash->success(__('The series option has been deleted.'));
        } else {
            $this->Flash->error(__('The series option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
