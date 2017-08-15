<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Series'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Series Product'), ['controller' => 'SeriesProduct', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series Product'), ['controller' => 'SeriesProduct', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="series form large-9 medium-8 columns content">
    <?= $this->Form->create($series) ?>
    <fieldset>
        <legend><?= __('Add Series') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
