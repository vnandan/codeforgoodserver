<?php
echo $this->Form->create('User', array('action' => 'mentorskill/'.$id));
echo $this->Form->input('profession');
echo $this->Form->input('skills',array('label'=>'Skills','type'=>'textarea'));
echo $this->Form->end(__('Submit')); 
?>