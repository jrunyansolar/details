<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Options Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 *
 * @method \App\Model\Entity\Option[] paginate($object = null, array $settings = [])
 */
class OptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentOptions']
        ];
        $options = $this->paginate($this->Options->find('all')->contain(['ChildOptions'])->order('ISNULL(Options.order), Options.order ASC')->where(['Options.parent_id is null']));
 
        $this->set(compact('options'));
        $this->set('_serialize', ['options']);
    }

    /**
     * View method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $option = $this->Options->get($id, [
            'contain' => ['ParentOptions', 'ChildOptions']
        ]);

        $this->set('option', $option);
        $this->set('_serialize', ['option']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $success = false;
        $option = $this->Options->newEntity();
        if ($this->request->is('json')) {
             $option = $this->Options->patchEntity($option, $this->request->getData());
             if ($this->Options->save($option)) {
                 $success = true;
             }
        }
        else if ($this->request->is('post')) {
            $option = $this->Options->patchEntity($option, $this->request->getData());
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The option could not be saved. Please, try again.'));
        }
 
        $parentOptions = $this->Options->ParentOptions->find('list', ['limit' => 200])->order('ISNULL(Options.order), Options.order ASC')->where(['ParentOptions.parent_id is null']);
        $this->set(compact('success', 'option', 'parentOptions'));
        $this->set('_serialize', ['option',' success']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $option = $this->Options->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $option = $this->Options->patchEntity($option, $this->request->getData());
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action'=>'index']);
            }
            
            $this->Flash->error(__('The option could not be saved. Please, try again.'));
        }

        $childOptions = $this->Options->ParentOptions->find('all', ['limit' => 200])->order('ISNULL(ParentOptions.order), ParentOptions.order ASC')->where(['ParentOptions.parent_id'=> $id])->toList();
        $parentOptions = $this->Options->ParentOptions->find('list', ['limit' => 200])->order('ISNULL(ParentOptions.order), ParentOptions.order ASC')->where(['ParentOptions.parent_id is null'])->toList();
        $this->set(compact('option', 'childOptions', 'parentOptions'));
        $this->set('_serialize', ['option']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $option = $this->Options->get($id);
        if ($this->Options->delete($option)) {
            $this->Flash->success(__('The option has been deleted.'));
        } else {
            $this->Flash->error(__('The option could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
