<?php
echo $this->Session->read('Auth.User.role');
?>
<?php
	$css = array('users/dashboard');
	$js  = array('users/dashboard');
?>

<!-- CSS Includes -->
<?php //echo $this->Html->css($css, array('block' => 'layout_css')); ?>
<?php echo $this->Html->css($css); ?>
<!-- JS Includes -->
<?php //echo $this->Html->script($js, array('block' => 'layout_scripts')); ?>
<?php echo $this->Html->script($js); ?>

<?php if($userRole == 'mentee') { // Mentee ?>
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
	          	echo $this->Form->create('Post', array("class"=>"large-6 small-8 large-offset-3 small-offset-2 login-form",'controller'=>'post','action'=>'add'));
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
	        	<div class="large-6 small-8 large-offset-3 small-offset-2 columns login-form">
	        		<div class="large-12 small-12 columns">
		        		<label>Statement</label>
		        		<p><?php echo $myPdp['Post']['statement']; ?></p>
		        	</div>
		        	<div class="large-12 small-12 columns">
		        		<label>Description</label>
		        		<p><?php echo $myPdp['Post']['description']; ?></p>
		        	</div>
		        	
		        	<?php
		        	if($this->Session->read('Auth.User.role')==='mentor')
		        	{
		        	 echo $this->Form->create('Post'); 
		        	 ?>
		        	
		        	<div class="large-12 small-12 columns">
		        		<div class="large-6 small-6 columns">
			        		<label>Objective</label>
			        		<?php echo $this->Form->input('objective', array('value' => $myPdp['objective'], 'type' => 'textarea')); ?>
			        	</div>
			        	<div class="large-12 small-12 columns">
			        		<label>Plan</label>
			        		<?php echo $this->Form->input('plan', array('value' => $myPdp['plan'], 'type' => 'textarea')); ?>
			        	</div>
		        	</div>
		        	<?php echo $this->Form->submit('Update'); ?>
		        	<?php echo $this->Form->end();
		        	}
		        	 ?>
	        	</div>
	        </div>
	      </div>
	    </div>
	</div>
<?php } else if($userRole == 'mentor') { ?>
	
<?php } else if($userRole == 2) { ?>
	
<?php } else if($userRole == 3) { ?>
	
<?php } ?>