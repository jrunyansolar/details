<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProductType $productType
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $productType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Type'), ['action' => 'delete', $productType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productTypes view large-9 medium-8 columns content">
    <h3><?= h($productType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Key') ?></th>
            <td><?= h($productType->key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($productType->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Series Id') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Dwg Path') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Pdf Path') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productType->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->series_id) ?></td>
                <td><?= h($products->product_type_id) ?></td>
                <td><?= h($products->dwg_path) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->pdf_path) ?></td>
                <td><?= h($products->order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
