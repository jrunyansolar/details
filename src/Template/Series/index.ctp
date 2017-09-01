<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Series[]|\Cake\Collection\CollectionInterface $series
  */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">


            <div class="series index large-9 medium-8 columns content">
                <h3><?= __('Series') ?></h3>
                <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($series as $series): ?>
                        <tr>
                            <td><?= h($series->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $series->id], ['class'=>'btn btn-xs btn-standard']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id), 'class'=>'btn btn-xs btn-danger']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>