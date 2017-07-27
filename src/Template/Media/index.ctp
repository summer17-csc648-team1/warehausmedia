<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Media[]|\Cake\Collection\CollectionInterface $media
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="media index large-9 medium-8 columns content">
    <h3><?= __('Media') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('MediaID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FileLocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ThumbnailLocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MediaType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Format') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DateUploaded') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Categories_Category_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Users_UserID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($media as $media): ?>
            <tr>
                <td><?= $this->Number->format($media->MediaID) ?></td>
                <td><?= h($media->Title) ?></td>
                <td><?= h($media->FileLocation) ?></td>
                <td><?= h($media->ThumbnailLocation) ?></td>
                <td><?= h($media->MediaType) ?></td>
                <td><?= h($media->Format) ?></td>
                <td><?= h($media->DateUploaded) ?></td>
                <td><?= $this->Number->format($media->Price) ?></td>
                <td><?= $this->Number->format($media->Categories_Category_ID) ?></td>
                <td><?= $this->Number->format($media->Users_UserID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $media->MediaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->MediaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->MediaID], ['confirm' => __('Are you sure you want to delete # {0}?', $media->MediaID)]) ?>
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
