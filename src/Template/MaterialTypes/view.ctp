<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\MaterialType $materialType
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material Type'), ['action' => 'edit', $materialType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material Type'), ['action' => 'delete', $materialType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Material Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Material Type'), ['controller' => 'ProductMaterialType', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialTypes view large-9 medium-8 columns content">
    <h3><?= h($materialType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($materialType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Identifier Key') ?></th>
            <td><?= h($materialType->identifier_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($materialType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Material Type') ?></h4>
        <?php if (!empty($materialType->product_material_type)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Material Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($materialType->product_material_type as $productMaterialType): ?>
            <tr>
                <td><?= h($productMaterialType->id) ?></td>
                <td><?= h($productMaterialType->product_id) ?></td>
                <td><?= h($productMaterialType->material_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductMaterialType', 'action' => 'view', $productMaterialType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductMaterialType', 'action' => 'edit', $productMaterialType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductMaterialType', 'action' => 'delete', $productMaterialType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productMaterialType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
