<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="series form large-9 medium-8 columns content">
                <?= $this->Form->create($series) ?>
                <h3><?= __('Edit Series') ?></h3>
                <div class="form-group">
                    <?= $this->Form->control('name', ['class'=>'form-control']); ?>
                </div>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>

        </div>
    </div>
</div>
