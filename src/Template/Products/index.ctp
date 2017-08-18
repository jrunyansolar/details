<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        <div class="products index large-9 medium-8 columns content">
            <h3><?= __('Products') ?></h3>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('series_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_type_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('material_type_id') ?></th>
                        
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= h($product->name) ?></td>
                        <td><?= $product->has('series') ? $this->Html->link($product->series->name, ['controller' => 'Series', 'action' => 'view', $product->series->id]) : '' ?></td>
                        <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                        <td><?= $product->has('material_type') ? $this->Html->link($product->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $product->material_type->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $product->id], ['class'=>'btn btn-sm btn-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class'=>'btn btn-sm btn-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['class'=>'btn btn-sm btn-primary', 'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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