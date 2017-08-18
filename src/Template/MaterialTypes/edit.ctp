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
                ['action' => 'delete', $materialType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materialType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Material Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($materialType) ?>
    <fieldset>
        <legend><?= __('Edit Material Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('identifier_key');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
