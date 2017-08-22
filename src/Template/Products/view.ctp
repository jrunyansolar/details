<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product $product
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="products view large-9 medium-8 columns content">
                <h3><?= h($product->name) ?></h3>
                <table class="table table-responsive table-striped">
                    <tr>
                        <th scope="row"><?= __('Series') ?></th>
                        <td><?= $product->has('series') ? $this->Html->link($product->series->name, ['controller' => 'Series', 'action' => 'view', $product->series->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Product Type') ?></th>
                        <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Material Type') ?></th>
                        <td><?= $product->has('material_type') ? $this->Html->link($product->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $product->material_type->id]) : '' ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Product Material Type') ?></h4>
                    <?php if (!empty($product->product_material_type)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Product Id') ?></th>
                            <th scope="col"><?= __('Material Type Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_material_type as $productMaterialType): ?>
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
                <div class="related">
                    <h4><?= __('Related Series Product') ?></h4>
                    <?php if (!empty($product->series_product)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-responsive">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Series Id') ?></th>
                            <th scope="col"><?= __('Product Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->series_product as $seriesProduct): ?>
                        <tr>
                            <td><?= h($seriesProduct->id) ?></td>
                            <td><?= h($seriesProduct->series_id) ?></td>
                            <td><?= h($seriesProduct->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SeriesProduct', 'action' => 'view', $seriesProduct->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SeriesProduct', 'action' => 'edit', $seriesProduct->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SeriesProduct', 'action' => 'delete', $seriesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seriesProduct->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>  
        </div>
    </div>
</div>
