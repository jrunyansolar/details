<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="products form large-9 medium-8 columns content">
            <hr/>
                <span>Or you can use the drag and drop method, and drop a PDF below.</span>

                <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
                
                <?= $this->Form->create($product) ?>
                <h3><?= __('Add Product') ?></h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group"><?=  $this->Form->control('series_id', ['options' => $series, 'empty' => true, 'class'=>'form-control']); ?></div>
                        </div>
                    <div class="col-md-3">
                        <div class="form-group"><?=  $this->Form->control('product_type_id', ['options' => $productTypes, 'empty' => true, 'class'=>'form-control']); ?></div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group"><?=  $this->Form->control('material_type_id', ['options' => $materialTypes, 'empty' => true, 'class'=>'form-control']); ?></div>
                    </div>
                </div>

                <?= $this->Cell('ProductOptions', [true]); ?> 
                
                <div class="form-group"><?=  $this->Form->control('name', ['class'=>'form-control']); ?></div>

                <div class="form-group"><?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?></div>
                <?= $this->Form->end() ?>

                 
            </div>

        </div>
    </div>
</div>
