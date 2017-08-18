<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="products form large-9 medium-8 columns content">
                <?= $this->Form->create($product) ?>
                    <h3><?= __('Edit Product') ?></h3>
                    <div class="form-group"><label>Series</label><?= $this->Form->control('series_id', ['options' => $series, 'label'=>false, 'empty' => "-"], ['class'=>'form-control']); ?></div>
                    <div class="form-group"><label>Product Type</label><?= $this->Form->control('product_type_id', ['options' => $productTypes, 'label'=>false, 'empty' => "-"], ['class'=>'form-control']); ?></div>
                    <div class="form-group"><label>Material Type</label><?= $this->Form->control('material_type_id', ['options' => $materialTypes, 'label'=>false, 'empty' => "-"], ['class'=>'form-control']); ?></div>
                    <div class="form-group"><?= $this->Form->control('name', ['class'=>'form-control']); ?></div>
                    <div class="form-group"><?= $this->Form->control('pdf_path', ['class'=>'form-control']); ?></div>
                    <div class="form-group"><?= $this->Form->control('png_path', ['class'=>'form-control']); ?></div>
                    <div class="form-group"><?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>