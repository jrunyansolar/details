<?php
/**
  * @var \App\View\AppView $this
  */
?>
  
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="options form large-9 medium-8 columns content">
                <?= $this->Form->create($option) ?>
                <h3><?= __('Add Option') ?></h3>
                <div class="form-group"><label>Option Type</label><?= $this->Form->select('type', [
                        0=>'Multi Choice Text',
                        1=>'Free Numeric',
                        2=>'Multi Choice Numeric',
                        ], ['class'=>'form-control']); ?></div>                
                <div class="form-group"><label>Nest Option Under Parent:</label><?= $this->Form->control('parent_id', ['label'=>false, 'options' => $parentOptions, 'empty' => '-'], ['class'=>'form-control']); ?></div>
                <div class="form-group"><?= $this->Form->control('name', ['class'=>'form-control']); ?></div>
                <div class="form-group"><?= $this->Form->control('identifier_key', ['class'=>'form-control', 'disabled']); ?></div>

                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default']) ?> 
                <a class="btn btn-success generate-identifier-key">Generate Identifier Key</a>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>