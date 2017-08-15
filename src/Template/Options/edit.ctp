<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $option->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="options form large-9 medium-8 columns content">
    <?= $this->Form->create($option) ?>
    <fieldset>
        <legend><?= __('Edit Option') ?></legend>
        <?php
            echo $this->Form->control('parent_id', ['options' => $parentOptions, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('value');
            echo $this->Form->control('series._ids', ['options' => $series]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
