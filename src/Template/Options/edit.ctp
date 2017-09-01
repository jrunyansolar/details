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
                    <h3><?= __('Edit Option') ?></h3>
                    
                    <div class="form-group">
                        <label>Option Type</label><?= $this->Form->select('type', [
                            0=>'Multi Choice Text',
                            1=>'Free Numeric',
                            2=>'Multi Choice Numeric',
                            ], ['class'=>'form-control']); ?>
                    </div>
                        
                    <div class="form-group"><?= $this->Form->control('name', ['class'=>'form-control','autofocus']); ?></div>
                    <?php if(!empty($option->parent_id)): ?><div class="form-group"><?= $this->Form->control('identifier_key', ['class'=>'form-control', 'disabled']); ?></div> <?php endif; ?>
                    <div class="form-group"><?= $this->Form->control('order', ['class'=>'form-control']); ?></div>
                    
                <div class="form-group"><?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?> <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-danger']) ?></div>
                <?= $this->Form->end() ?>
            </div>
 

            <?php if(empty($option->parent_id)): ?>
            <hr/>
            <div class="related">
                <h4><?= __('Related Options') ?></h4>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    Add Related Option
                </button>

                <hr/>
                <?php if(count($childOptions) > 0): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped" id="related-options">
                    <tr>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Identifier Key') ?></th>
                        <th scope="col"><?= __('Order') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php   
                    foreach ($childOptions as $key=>$child):  
                    ?>
                    <tr>
                        <td><?= h($child->name) ?></td>
                        <td><?= h(empty($child->identifier_key) ? "-" : $child->identifier_key) ?></td>
                        <td><?= empty($child->order) ? "-" : $child->order ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Options', 'action' => 'edit', $child->id], ['class'=>'btn btn-primary btn-xs']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Options', 'action' => 'delete', $child->id], ['confirm' => __('Are you sure you want to delete # {0}?', $child->id), 'class'=>'btn btn-primary btn-xs']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else: ?>
                    <h4>There are no related options.</h4>
                <?php endif; ?>
        
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create($option, ['url'=>'add']) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Option</h4>
            </div>

            <div class="modal-body">
                <div class="options form large-9 medium-8 columns content">
                    <div class="alert" id="alert" style="display: none"></div>               
                    <!--<div class="form-group"><label>Nest Option Under Parent:</label><?= $this->Form->control('parent_id', ['label'=>false, 'options' => $option->product_options, 'empty' => '-'], ['class'=>'form-control']); ?></div>-->
                    <div class="form-group"><?= $this->Form->control('new_name', ['class'=>'form-control','value'=>'']); ?></div>
                    <div class="form-group"><?= $this->Form->control('new_identifier_key', ['class'=>'form-control','value'=>'']); ?></div>
                    <?= $this->Form->hidden('new_parent_id', ['id'=>'new-parent-id', 'value'=> $option->id], 1); ?>
                    <a class="btn btn-default modal-generate-identifier-key">Generate Identifier Key</a>   
                </div>
            </div>
            <div class="modal-footer">
                

                <label><?= $this->Form->checkbox('KeepOpen',['id'=>'keep-open']); ?> Add more related products. </label>
                 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Save Changes'), ['id'=>'add-option-save-changes', 'class'=>'btn btn-success']) ?>
                
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
