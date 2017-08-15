<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SeriesProduct $seriesProduct
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Series Product'), ['action' => 'edit', $seriesProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Series Product'), ['action' => 'delete', $seriesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seriesProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Series Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="seriesProduct view large-9 medium-8 columns content">
    <h3><?= h($seriesProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Series') ?></th>
            <td><?= $seriesProduct->has('series') ? $this->Html->link($seriesProduct->series->name, ['controller' => 'Series', 'action' => 'view', $seriesProduct->series->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $seriesProduct->has('product') ? $this->Html->link($seriesProduct->product->name, ['controller' => 'Products', 'action' => 'view', $seriesProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seriesProduct->id) ?></td>
        </tr>
    </table>
</div>
