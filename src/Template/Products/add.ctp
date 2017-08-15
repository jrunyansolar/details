<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Series Product'), ['controller' => 'SeriesProduct', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series Product'), ['controller' => 'SeriesProduct', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('series_id', ['options' => $series, 'empty' => true]);
            echo $this->Form->control('product_type_id', ['options' => $productTypes, 'empty' => true]);
            echo $this->Form->control('material_type_id', ['options' => $materialTypes, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('dwg_path');
            echo $this->Form->control('pdf_path');
            echo $this->Form->control('order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
