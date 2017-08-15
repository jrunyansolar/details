<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SeriesOption $seriesOption
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Series Option'), ['action' => 'edit', $seriesOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Series Option'), ['action' => 'delete', $seriesOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seriesOption->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Series Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="seriesOptions view large-9 medium-8 columns content">
    <h3><?= h($seriesOption->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Series') ?></th>
            <td><?= $seriesOption->has('series') ? $this->Html->link($seriesOption->series->name, ['controller' => 'Series', 'action' => 'view', $seriesOption->series->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Option') ?></th>
            <td><?= $seriesOption->has('option') ? $this->Html->link($seriesOption->option->name, ['controller' => 'Options', 'action' => 'view', $seriesOption->option->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seriesOption->id) ?></td>
        </tr>
    </table>
</div>
