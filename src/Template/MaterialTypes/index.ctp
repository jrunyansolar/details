<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\MaterialType[]|\Cake\Collection\CollectionInterface $materialTypes
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="materialTypes index large-9 medium-8 columns content">
                <h3><?= __('Material Types') ?></h3>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materialTypes as $materialType): ?>
                        <tr>
                            <td><?= $this->Number->format($materialType->id) ?></td>
                            <td><?= h($materialType->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $materialType->id], ['class'=>'btn btn-primary']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialType->id], ['class'=>'btn btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialType->id], ['class'=>'btn btn-primary', 'confirm' => __('Are you sure you want to delete # {0}?', $materialType->id)]) ?>
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