<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProductType[]|\Cake\Collection\CollectionInterface $productTypes
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="productTypes index large-9 medium-8 columns content">
                <h3><?= __('Product Types') ?></h3>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('key') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productTypes as $productType): ?>
                        <tr>
                            <td><?= h($productType->name) ?></td>
                            <td><?= h($productType->key) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $productType->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productType->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productType->id], ['class'=>'btn btn-primary btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?>
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