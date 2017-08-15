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
                ['action' => 'delete', $productType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($productType) ?>
    <fieldset>
        <legend><?= __('Edit Product Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('key');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
