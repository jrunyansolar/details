<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Option $option
  */
?>

<div class="container">
<div class="row">
<div class="col-md-12">


<div class="options view large-9 medium-8 columns content">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        Add Related Option
    </button>

    <hr/>

    <h3><?= h($option->name) ?></h3>
    <table class="table table-striped vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($option->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= ($option->type == 0 ? "Multi Choice Text" : "Free Numeric")  ?></td>
        </tr>
    </table>

    
    <div class="related">
        <h4><?= __('Related Options') ?></h4>
        <?php if (!empty($option->child_options)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Identifier Key') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($option->child_options as $childOptions): ?>
            <tr>
                <td><?= h($childOptions->name) ?></td>
                <td><?= h($childOptions->identifier_key) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Options', 'action' => 'view', $childOptions->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Options', 'action' => 'edit', $childOptions->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Options', 'action' => 'delete', $childOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childOptions->id), 'class'=>'btn btn-primary btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<!--
    <div class="related">
        <h4><?= __('Related Product Options') ?></h4>
        <?php if (!empty($option->product_options)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Option Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($option->product_options as $productOptions): ?>
            <tr>
                <td><?= h($productOptions->id) ?></td>
                <td><?= h($productOptions->option_id) ?></td>
                <td><?= h($productOptions->product_id) ?></td>
                <td class="actions">test
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductOptions', 'action' => 'view', $productOptions->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductOptions', 'action' => 'edit', $productOptions->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductOptions', 'action' => 'delete', $productOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productOptions->id), 'class'=>'btn btn-primary btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create() ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Option</h4>
            </div>
            <div class="modal-body">
                <div class="options form large-9 medium-8 columns content">
                    <div class="alert" id="alert" style="display: none"></div>               
                    <!--<div class="form-group"><label>Nest Option Under Parent:</label><?= $this->Form->control('parent_id', ['label'=>false, 'options' => $option->product_options, 'empty' => '-'], ['class'=>'form-control']); ?></div>-->
                    <div class="form-group"><?= $this->Form->control('name', ['class'=>'form-control','value'=>'']); ?></div>
                    <div class="form-group"><?= $this->Form->control('identifier_key', ['class'=>'form-control','value'=>'']); ?></div>
                    <?= $this->Form->hidden('parent_id', ['id'=>'parent-id', 'value'=> $option->id], 1); ?>
                    <a class="btn btn-default generate-identifier-key">Generate Identifier Key</a>   
                </div>
            </div>
            <div class="modal-footer">
                

                <label><?= $this->Form->checkbox('KeepOpen',['id'=>'keep-open']); ?> Add more related products. </label>
                <br/>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Save Changes'), ['id'=>'add-option-save-changes', 'class'=>'btn btn-success']) ?>
                
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>

</div>



</div>
</div>
</div>
