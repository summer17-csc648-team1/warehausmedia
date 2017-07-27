<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messages index large-9 medium-8 columns content">
    <h3><?= __('Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('User1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('User2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $this->Number->format($message->User1) ?></td>
                <td><?= $this->Number->format($message->User2) ?></td>
                <td><?= h($message->Message) ?></td>
                <td><?= h($message->Date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $message->User1]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->User1]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->User1], ['confirm' => __('Are you sure you want to delete # {0}?', $message->User1)]) ?>
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
