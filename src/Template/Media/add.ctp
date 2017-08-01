<?php $this->layout = false;?>

<!DOCTYPE html>
<html>
    <head>

	<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>
        </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: black;
            }
            li a {
                float: right;
            }
            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }
            li a:hover:not(.active) {
                color: white;
                background-color: black;
            }
            .logo {
                float: left;
                position: relative;
                margin: 0;
                padding: 0;
                diaplay: block;
                color: white;
                background-color: red;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }
            .active {
                color: white;
                background-color: red;
            }
            
        </style>

        <link rel="stylesheet" type="text/css" href="site.css">
    </head>
    <body>
        <ul>
            <li><a class="logo" href="/">WAREHAUS</a></li>
            <li><a href="/"> SIGN OUT</a></li>
            <li><a href="/Media/edit"> MANAGE UPLOADS</a></li>
            <li><a href="/Media/add"> UPLOADS</a></li>
            <li><a href="/pages/support"> CONTACT</a></li>
            <li><a href="/pages/warehaus"> ABOUT US</a></li>
        </ul>
        

        <h1 style="text-align: center">Add Media</h1>
        <div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
           
        <?= $this->Form->create(); ?>
            
            <?= $this->Form->input('Title', array(
                                           'label' => 'Title',
                                           'class'=> 'form-control'
                                            
                                    ));?>
            <?= $this->Form->input('Description', array(
                                           'label' => 'Description',
                                           'class'=> 'form-control',
                                           'type' => 'textarea'
                                    ));?>
            <?= $this->Form->input('Categories_Category_ID', array(
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
            
            <?= $this->Form->hidden('Users_UserID', array(
                                           'type' => 'int',
                                           'value' => h($userid),
                                           'empty' => false
                                    ));?>
            
            
        <?= $this->Form->submit('Create Product', array('class' => 'btn btn-primary')); ?>    
        <?= $this->Form->end(); ?>
        
        </div>


    </body>
</html>

