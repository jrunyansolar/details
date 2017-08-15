<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Series $series
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Series'), ['action' => 'edit', $series->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Series'), ['action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series Product'), ['controller' => 'SeriesProduct', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series Product'), ['controller' => 'SeriesProduct', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="series view large-9 medium-8 columns content">
    <h3><?= h($series->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($series->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($series->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($series->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Series Id') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Material Type Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Dwg Path') ?></th>
                <th scope="col"><?= __('Pdf Path') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($series->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->series_id) ?></td>
                <td><?= h($products->product_type_id) ?></td>
                <td><?= h($products->material_type_id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->dwg_path) ?></td>
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
    <div class="related">
        <h4><?= __('Related Series Product') ?></h4>
        <?php if (!empty($series->series_product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Series Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($series->series_product as $seriesProduct): ?>
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
