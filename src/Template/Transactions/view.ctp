<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Transaction $transaction
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->OrderDate]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->OrderDate], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->OrderDate)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->OrderDate) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('SoldBy') ?></th>
            <td><?= $this->Number->format($transaction->SoldBy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PurchasedBy') ?></th>
            <td><?= $this->Number->format($transaction->PurchasedBy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OrderDate') ?></th>
            <td><?= h($transaction->OrderDate) ?></td>
        </tr>
    </table>
</div>
