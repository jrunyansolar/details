<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product $product
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series Product'), ['controller' => 'SeriesProduct', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series Product'), ['controller' => 'SeriesProduct', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Series') ?></th>
            <td><?= $product->has('series') ? $this->Html->link($product->series->name, ['controller' => 'Series', 'action' => 'view', $product->series->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material Type') ?></th>
            <td><?= $product->has('material_type') ? $this->Html->link($product->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $product->material_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dwg Path') ?></th>
            <td><?= h($product->dwg_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pdf Path') ?></th>
            <td><?= h($product->pdf_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $this->Number->format($product->order) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Material Type') ?></h4>
        <?php if (!empty($product->product_material_type)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Material Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_material_type as $productMaterialType): ?>
            <tr>
                <td><?= h($productMaterialType->id) ?></td>
                <td><?= h($productMaterialType->product_id) ?></td>
                <td><?= h($productMaterialType->material_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductMaterialType', 'action' => 'view', $productMaterialType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductMaterialType', 'action' => 'edit', $productMaterialType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductMaterialType', 'action' => 'delete', $productMaterialType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productMaterialType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Series Product') ?></h4>
        <?php if (!empty($product->series_product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Series Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->series_product as $seriesProduct): ?>
            <tr>
                <td><?= h($seriesProduct->id) ?></td>
                <td><?= h($seriesProduct->series_id) ?></td>
                <td><?= h($seriesProduct->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SeriesProduct', 'action' => 'view', $seriesProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SeriesProduct', 'action' => 'edit', $seriesProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SeriesProduct', 'action' => 'delete', $seriesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seriesProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
