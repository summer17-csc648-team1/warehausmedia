<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="index large-3 medium-3 large-offset-3 medium-offset-3 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('Username');
            echo $this->Form->control('Password');
            echo $this->Form->control('Role');
            echo $this->Form->control('Email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
