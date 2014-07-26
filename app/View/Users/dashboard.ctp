<?php
/*
if($this->user_role == 0) { // Mentee ?>
=======
	$css = array('users/dashboard');
	$js  = array('users/dashboard');
?>

<!-- CSS Includes -->
<?php //echo $this->Html->css($css, array('block' => 'layout_css')); ?>
<?php echo $this->Html->css($css); ?>
<!-- JS Includes -->
<?php //echo $this->Html->script($js, array('block' => 'layout_scripts')); ?>
<?php echo $this->Html->script($js); ?>

<?php if($userRole == 0) { // Mentee ?>
>>>>>>> 2731fa9f279b85436f639438df2f92e89a5869b5
	<div class='row'>
		<div class="large-12 small-12 columns dashboard-tabs">
	      <ul class="left">
	        <li class="active"><a href="#panel1">Post Problem</a></li>
	        <li><a href="#panel2">My PDP</a></li>
	      </ul>
	      <ul class="right">
	        <li><a href="logout">Logout</a></li>
	      </ul>
	    </div>
	    <div id="panel1" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	          <?php
	          	echo $this->Form->create('Post');
	          	echo $this->Form->input('statement', array('required' => true));
		        echo $this->Form->input('description', array('type' => 'textarea', 'required' => true));
		        echo $this->Form->submit('Post');
	          	echo $this->Form->end();
	          ?>
	        </div>
	      </div>
	    </div>
	    <div id="panel2" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	          
	        </div>
	      </div>
	    </div>
	</div>
<?php } else if($userRole == 1) { ?>
	
<?php } else if($userRole == 2) { ?>
	
<?php } else if($userRole == 3) { ?>
	
<?php }*/ ?>

<?php
echo $this->Form->create('Post',array('action'=>'add'));
echo $this->Form->input('statement',array('label'=>'Statement'));
echo $this->Form->input('description',array('label'=>'Description'));
echo $this->Form->end(__('Submit')); 
?>
