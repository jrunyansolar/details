<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Option[]|\Cake\Collection\CollectionInterface $options
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="options index large-9 medium-8 columns content">
                <h3><?= __('Options') ?></h3>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('parent_id', ['title'=>'Number of Options']) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($options as $option): ?>
                        <tr>
                            <td><?= $this->Number->format($option->id) ?></td>
                            <td><?= h($option->name) ?></td>
                            <td><?= count($option->ChildOptions) ?></td>
                            <td><?= ($option->type == 0 ? "Multi Choice Text" : "Free Numeric")  ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $option->id], ['class'=>'btn btn-primary btn-xs']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $option->id], ['class'=>'btn btn-primary btn-xs']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $option->id], ['class'=>'btn btn-primary btn-xs', 'confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>