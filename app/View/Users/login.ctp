<div class="users form box">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array("class"=>"large-4 small-8 large-offset-4 small-offset-2 login-form",'action'=>'login')); ?>
    <fieldset>
        <legend><?php echo __('Login'); ?></legend>
        <?php
	        echo $this->Form->input('email', array('required' => true));
	        echo $this->Form->input('password', array('required' => true));
	        echo $this->Form->submit('Login/Signup');
	    ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>