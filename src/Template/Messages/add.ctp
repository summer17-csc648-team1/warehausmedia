<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
    <?= $this->Form->create(); ?>
    <br><br>
    <h1><?php echo "To: John"; ?></h1>
    <br><br>
    <?= $this->Form->input('Message', array(
        'label' => 'Message*:',
        'class'=> 'form-control',
        'type' => 'textArea'
    ));?>

    <?= $this->Form->hidden('User1', array(
        'type' => 'int',
        'value' => 3,   // ! change 1  to user1 variable
        'empty' => false
    ));?>


    <?= $this->Form->hidden('User2', array(
        'type' => 'int',
        'value' => 2, // ! change 2 to user2 variable
        'empty' => false
    ));?>

    <?= $this->Form->hidden('Date', array(
        'type' => 'datetime',
        'value' => date("Y-m-d H:i:s"),
        'empty' => false
    ));?>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
