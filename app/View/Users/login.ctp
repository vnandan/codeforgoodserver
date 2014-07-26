<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array("class"=>"large-4 small-8 large-offset-4 small-offset-2 login-form")); ?>
    <fieldset>
        <legend><?php echo __('Login'); ?></legend>
        <?php
	        echo $this->Form->input('email');
	        echo $this->Form->input('password');
	        echo $this->Form->submit('Login');
	    ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>