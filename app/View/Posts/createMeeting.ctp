<?php
echo "<div class='clear-fix'></div>";
echo $this->Form->create('Meeting', array('action' => '/codeforgoodserver/posts/view/'.$id, "class"=>"large-4 small-8 large-offset-4 small-offset-2 login-form"));
echo $this->Form->input('time');
echo $this->Form->input('venue');
echo $this->Form->submit('Create');
echo $this->Form->end(); 
?>