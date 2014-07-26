<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('role',array('type'=>'radio','options'=>array('mentee'=>'Mentee','mentor'=>'Mentor')));
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('mob',array('label'=>'Contact'));
        echo $this->Form->input('language',array('label'=>'Preferred Language'));
        echo $this->Form->input('dob',array('label'=>'Date of Birth'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>