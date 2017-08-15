<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Series Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="seriesOptions form large-9 medium-8 columns content">
    <?= $this->Form->create($seriesOption) ?>
    <fieldset>
        <legend><?= __('Add Series Option') ?></legend>
        <?php
            echo $this->Form->control('series_id', ['options' => $series, 'empty' => true]);
            echo $this->Form->control('options_id', ['options' => $options, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
