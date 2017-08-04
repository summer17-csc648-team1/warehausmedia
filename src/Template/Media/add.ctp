<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Media'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="media form large-9 medium-8 columns content">
    <?= $this->Form->create($media) ?>
    <fieldset>
        <legend><?= __('Add Media') ?></legend>
        <?php
            echo $this->Form->control('Title');
            echo $this->Form->control('FileLocation');
            echo $this->Form->control('ThumbnailLocation');
            echo $this->Form->control('MediaType');
            echo $this->Form->control('Format');
            echo $this->Form->control('DateUploaded', ['empty' => true]);
            echo $this->Form->control('Price');
            echo $this->Form->control('Description');
        ?>
                    <div class="input text">
                        <label for="category_id">
                            Category_ID
                        </label>
                        <input type="text" name="category_id" id="category_id"/>
                    </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
