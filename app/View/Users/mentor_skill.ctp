<?php
echo "<div class='clear-fix'></div>";
echo $this->Form->create('User', array('action' => 'mentorskill/'.$id, "class"=>"large-4 small-8 large-offset-4 small-offset-2 login-form"));
echo $this->Form->input('profession');
echo $this->Form->input('skills',array('label'=>'Skills','type'=>'textarea'));
echo $this->Form->end(__('Submit')); 
?>