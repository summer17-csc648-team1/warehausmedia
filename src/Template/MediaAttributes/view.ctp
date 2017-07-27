<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\MediaAttribute $mediaAttribute
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Media Attribute'), ['action' => 'edit', $mediaAttribute->MediaID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Media Attribute'), ['action' => 'delete', $mediaAttribute->MediaID], ['confirm' => __('Are you sure you want to delete # {0}?', $mediaAttribute->MediaID)]) ?> </li>
        <li><?= $this->Html->link(__('List Media Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media Attribute'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mediaAttributes view large-9 medium-8 columns content">
    <h3><?= h($mediaAttribute->MediaID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Media Attributes') ?></th>
            <td><?= h($mediaAttribute->Media_Attributes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MediaID') ?></th>
            <td><?= $this->Number->format($mediaAttribute->MediaID) ?></td>
        </tr>
    </table>
</div>
