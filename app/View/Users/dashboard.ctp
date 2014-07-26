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

<?php if($userRole === 'mentee') { // Mentee ?>
	<div class='row'>
		<div class="large-12 small-12 columns dashboard-tabs">
	      <ul class="left">
	        <li class="active"><a href="#panel1">Post Problem</a></li>
	        <?php if(count($myPdp) > 0) { ?>
	        	<li><a href="#panel2">My PDP</a></li>
	        <?php } else { ?>
	        	<span>My PDP</span>
	        <?php } ?>
	      </ul>
	      <ul class="right">
	        <li><a href="logout">Logout</a></li>
	      </ul>
	    </div>
	    <div id="panel1" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	          <?php
	          	echo $this->Form->create('Post', array("class"=>"large-6 small-8 large-offset-3 small-offset-2 login-form"));
	          	echo $this->Form->input('statement', array('required' => true));
		        echo $this->Form->input('description', array('type' => 'textarea', 'required' => true));
		        echo $this->Form->submit('Post');
	          	echo $this->Form->end();
	          ?>
	        </div>
	      </div>
	    </div>
	    <?php if(count($myPdp) > 0) { ?>
	    <div id="panel2" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	        	<div class="large-6 small-8 large-offset-3 small-offset-2 columns login-form">
	        		<div class="large-12 small-12 columns">
		        		<label>Statement</label>
		        		<p><?php echo $myPdp['statement']; ?></p>
		        	</div>
		        	<div class="large-12 small-12 columns">
		        		<label>Description</label>
		        		<p><?php echo $myPdp['description']; ?></p>
		        	</div>
		        	<?php echo $this->Form->create('Post'); ?>
		        	<div class="large-12 small-12 columns">
		        		<div class="large-6 small-12 columns">
			        		<label>Objective</label>
			        		<p><?php echo $myPdp['objective']; ?></p>
			        	</div>
			        	<div class="large-6 small-12 columns">
			        		<label>Plan</label>
			        		<p><?php echo $myPdp['plan']; ?></p>
			        	</div>
		        	</div>
		        	<?php echo $this->Form->submit('Update'); ?>
		        	<?php echo $this->Form->end(); ?>
	        	</div>
	        </div>
	      </div>
	    </div>
	    <?php } ?>
	</div>
<?php } else if($userRole === 'mentor') { ?>
	<div class='row'>
		<div class="large-8 small-12 columns">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	        	<form class="large-12 small-12 columns search-form" action="">
	        		<input type="text" id="searchBox">
	        		<input type="submit" value="Search">
	        	</form>
	        </div>
	      </div>
	    </div>
	</div>
<?php } else if($userRole === 2) { ?>
	
<?php } else if($userRole === 3) { ?>
	
<?php } ?>