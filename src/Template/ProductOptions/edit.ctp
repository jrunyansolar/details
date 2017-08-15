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
                ['action' => 'delete', $productOption->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productOption->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productOptions form large-9 medium-8 columns content">
    <?= $this->Form->create($productOption) ?>
    <fieldset>
        <legend><?= __('Edit Product Option') ?></legend>
        <?php
            echo $this->Form->control('option_id', ['options' => $options, 'empty' => true]);
            echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
