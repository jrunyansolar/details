<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="materialTypes form large-9 medium-8 columns content">
                <?= $this->Form->create($materialType) ?>
 
                <h3><?= __('Add Material Type') ?></h3>
                <div class="form-group">
                    <?= $this->Form->control('name', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('identifier_key', ['class'=>'form-control']); ?>
                </div>
                 
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>