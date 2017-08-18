<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ProductType $productType
  */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="productTypes view large-9 medium-8 columns content">
                <h3><?= h($productType->name) ?></h3>
                <table class="vertical-table table table-responsive table-striped">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($productType->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Key') ?></th>
                        <td><?= h($productType->key) ?></td>
                    </tr>
                </table>

                <div class="related">
                    <h4><?= __('Related Products') ?></h4>
                    <?php if (!empty($products)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped">
                        <tr>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Series Id') ?></th>
                            <th scope="col"><?= __('Material Type Id') ?></th>
                            <th scope="col"><?= __('Product Type Id') ?></th>
                            
                            <th scope="col"><?= __('Pdf Path') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->series->name) ?></td>
                            <td><?= h($product->material_type->name) ?></td>
                            
                            <td><?= h($product->product_type->name) ?></td>
                            <td><?= h($product->pdf_path) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id], ['class'=>'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['class'=>'btn btn-primary btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
