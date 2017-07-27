<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $media->MediaID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $media->MediaID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Media'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="media form large-9 medium-8 columns content">
    <?= $this->Form->create($media) ?>
    <fieldset>
        <legend><?= __('Edit Media') ?></legend>
        <?php
            echo $this->Form->control('Title');
            echo $this->Form->control('FileLocation');
            echo $this->Form->control('ThumbnailLocation');
            echo $this->Form->control('MediaType');
            echo $this->Form->control('Format');
            echo $this->Form->control('DateUploaded', ['empty' => true]);
            echo $this->Form->control('Price');
            echo $this->Form->control('Categories_Category_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
