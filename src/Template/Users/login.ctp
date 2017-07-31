<?= $this->Form->create(); ?>
<?= $this->Form->input('Username', array(
                        'label' => 'Username',
                        'class' => 'form-control',
                        'type' => 'text'
                )); ?>
<?= $this->Form->input('Password', array(
                        'label' => 'Password',
                        'class' => 'form-control',
                        'type' => 'password'
                )); ?>
<?= $this->Form->submit('Login', array('class' => 'btn btn-array')); ?>

