<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SiteOption $siteOption
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site Option'), ['action' => 'edit', $siteOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site Option'), ['action' => 'delete', $siteOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteOption->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Site Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site Option'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="siteOptions view large-9 medium-8 columns content">
    <h3><?= h($siteOption->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($siteOption->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($siteOption->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Value') ?></h4>
        <?= $this->Text->autoParagraph(h($siteOption->value)); ?>
    </div>
</div>
