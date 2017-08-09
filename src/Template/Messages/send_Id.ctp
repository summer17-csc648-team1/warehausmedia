<?php
$this->layout = 'default';
$this->Html->css('home.css')
?>

<?php foreach ($users as $user):?>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
    <?= $this->Form->create(); ?>
    <br><br>
    <h3><?php echo "To: ".$user['Username']; ?></h3>
    <?= $this->Form->input('Message', array(
        'label' => 'Message*:',
        'class'=> 'form-control',
        'type' => 'textArea'
    ));?>

    <?= $this->Form->hidden('User1', array(
        'type' => 'int',
        'value' => $user1, 
        'empty' => false
    ));?>


    <?= $this->Form->hidden('User2', array(
        'type' => 'int',
        'value' => $user['UserID'],
        'empty' => false
    ));?>

    <?= $this->Form->hidden('Date', array(
        'type' => 'datetime',
        'value' => date("Y-m-d H:i:s"),
        'empty' => false
    ));?>

    <?= $this->Form->button(__('Send')) ?>
    <?= $this->Form->end() ?>
</div>

<?php endforeach;?>
