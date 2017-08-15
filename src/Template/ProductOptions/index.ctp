<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProductOption[]|\Cake\Collection\CollectionInterface $productOptions
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Option'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productOptions index large-9 medium-8 columns content">
    <h3><?= __('Product Options') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('option_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productOptions as $productOption): ?>
            <tr>
                <td><?= $this->Number->format($productOption->id) ?></td>
                <td><?= $productOption->has('option') ? $this->Html->link($productOption->option->name, ['controller' => 'Options', 'action' => 'view', $productOption->option->id]) : '' ?></td>
                <td><?= $productOption->has('product') ? $this->Html->link($productOption->product->name, ['controller' => 'Products', 'action' => 'view', $productOption->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productOption->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productOption->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOption->id)]) ?>
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
