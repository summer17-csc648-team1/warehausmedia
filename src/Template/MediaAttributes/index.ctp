<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\MediaAttribute[]|\Cake\Collection\CollectionInterface $mediaAttributes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Media Attribute'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mediaAttributes index large-9 medium-8 columns content">
    <h3><?= __('Media Attributes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('MediaID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Media_Attributes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mediaAttributes as $mediaAttribute): ?>
            <tr>
                <td><?= $this->Number->format($mediaAttribute->MediaID) ?></td>
                <td><?= h($mediaAttribute->Media_Attributes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mediaAttribute->MediaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mediaAttribute->MediaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mediaAttribute->MediaID], ['confirm' => __('Are you sure you want to delete # {0}?', $mediaAttribute->MediaID)]) ?>
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
