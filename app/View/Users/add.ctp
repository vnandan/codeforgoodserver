<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User', array("class"=>"large-6 small-10 large-offset-3 small-offset-1 login-form")); ?>
    <fieldset>
        <legend><?php echo __('Sign Up'); ?></legend>
        <?php
        echo $this->Form->input('role', array('type'=>'radio','options'=>array('mentee'=>'Mentee','mentor'=>'Mentor'), 'required' => true));
        echo $this->Form->input('name', array('required' => true));
        echo $this->Form->input('email', array('required' => true));
        echo $this->Form->input('password', array('required' => true));
        echo $this->Form->input('mob', array('label'=>'Contact'));
        echo $this->Form->input('language', array('label'=>'Preferred Language'));
        echo $this->Form->input('dob',array('label'=>'Date of Birth', 'class' => 'date-select', 'dateFormat' => 'DMY', 'maxYear' => date('Y')));
        echo $this->Form->submit('Sign Up');
    ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>