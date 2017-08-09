<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Media $media
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->MediaID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->MediaID], ['confirm' => __('Are you sure you want to delete # {0}?', $media->MediaID)]) ?> </li>
        <li><?= $this->Html->link(__('List Media'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="media view large-9 medium-8 columns content">
    <h3><?= h($media->MediaID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($media->Title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FileLocation') ?></th>
            <td><?= h($media->FileLocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ThumbnailLocation') ?></th>
            <td><?= h($media->ThumbnailLocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MediaType') ?></th>
            <td><?= h($media->MediaType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Format') ?></th>
            <td><?= h($media->Format) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MediaID') ?></th>
            <td><?= $this->Number->format($media->MediaID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($media->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category_ID') ?></th>
            <td><?= $this->Number->format($media->category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users UserID') ?></th>
            <td><?= $this->Number->format($media->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateUploaded') ?></th>
            <td><?= h($media->DateUploaded) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($media->Description) ?></td>
        </tr>
    </table>
</div>
