<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Option $option
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Option'), ['action' => 'edit', $option->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Option'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="options view large-9 medium-8 columns content">
    <h3><?= h($option->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent Option') ?></th>
            <td><?= $option->has('parent_option') ? $this->Html->link($option->parent_option->name, ['controller' => 'Options', 'action' => 'view', $option->parent_option->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($option->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($option->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($option->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($option->type) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Options') ?></h4>
        <?php if (!empty($option->child_options)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($option->child_options as $childOptions): ?>
            <tr>
                <td><?= h($childOptions->id) ?></td>
                <td><?= h($childOptions->parent_id) ?></td>
                <td><?= h($childOptions->name) ?></td>
                <td><?= h($childOptions->type) ?></td>
                <td><?= h($childOptions->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Options', 'action' => 'view', $childOptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Options', 'action' => 'edit', $childOptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Options', 'action' => 'delete', $childOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childOptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Series') ?></h4>
        <?php if (!empty($option->series)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($option->series as $series): ?>
            <tr>
                <td><?= h($series->id) ?></td>
                <td><?= h($series->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Series', 'action' => 'view', $series->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Series', 'action' => 'edit', $series->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Series', 'action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
