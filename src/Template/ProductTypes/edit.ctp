<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="productTypes form large-9 medium-8 columns content">
                <?= $this->Form->create($productType) ?>
                <h3><?= __('Edit Product Type') ?></h3>
                <div class="form-group"><?= $this->Form->control('name', ['class'=>'form-control']); ?></div>
                <div class="form-group"><?= $this->Form->control('key', ['class'=>'form-control', 'label'=>'Identifier Key']); ?></div>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?> <?= $this->Form->button(__('Generate Identifier Key'), ['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>

        </div>
    </div>
</div>
