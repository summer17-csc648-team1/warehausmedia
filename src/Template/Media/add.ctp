<?php $this->layout = 'default';?>

<!DOCTYPE html>
<html>
    <head>
        <h1 style="text-align: center">Add Media</h1>
        <div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
           
        <?= $this->Form->create('media', array('enctype'=>'multipart/form-data')); ?>
            
            <?= $this->Form->input('Title', array(
                                           'label' => 'Title',
                                           'class'=> 'form-control'
                                            
                                    ));?>
            <?= $this->Form->input('Description', array(
                                           'label' => 'Description',
                                           'class'=> 'form-control',
                                           'type' => 'textarea'
                                    ));?>
            <?= $this->Form->input('category_id', array(
                                           'label' => 'Category',
                                           'type' => 'select',
                                           'options' => h($category_array),
                                           'empty' => false
                                    ));?>
            <?= $this->Form->input('Price', array(
                                           'label' => 'Price',
                                           'class'=> 'form-control',
                                           'type' => 'number',
                                           'step' => '0.01'
                                    ));?>
            <?= $this->Form->input('upload', array(
                                           'label' => 'Upload',
                                           'class'=> 'form-control',
                                           'type' => 'file'
                                    ));?>
            
            <?= $this->Form->hidden('user_id', array(
                                           'type' => 'int',
                                           'value' => h($userid),
                                           'empty' => false
                                    ));?>
            
           
        <?= $this->Form->submit('Create Product', array('class' => 'btn btn-primary')); ?>
        <?= $this->Form->end(); ?>
        
        </div>


    </body>
</html>

