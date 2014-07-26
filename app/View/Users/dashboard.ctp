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
	          	echo $this->Form->create('Post', array("class"=>"large-6 small-8 large-offset-3 small-offset-2 login-form",'controller'=>'post','action'=>'add'));
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
		        	<?php echo $this->Form->end();
		        	}
		        	 ?>
	        	</div>
	        </div>
	      </div>
	    </div>
	    <?php } ?>
	</div>
<?php } else if($userRole === 'mentor') { ?>
	<div class="clear-fix"></div>
	<div class='row'>
		<div class="large-8 small-12 columns">
			<form class="	search-form" method="post" action="dashboard">
				<span class="sub-title">Search Problems</span>
        		<input type="text" id="searchBox">
        		<input type="submit" value="Search">
        	</form>
        	<div class="card">
        	</div>
	     </div>
	     <div class="large-4 small-12 columns">
	     	<?php 
	     		$mentorPdp = array();
	     		for($i=0; $i<count($mentorPdp); $i++) {
	     			echo "<a href='/codeforgoodserver/posts/view/id/".$mentorPdp[$i]['id']."'>";
	     			echo "<div class='large-12 small-12 columns card'>";
	     			echo "<div>".$mentorPdp[$i]['User']['name']."</div>";
	     			echo "<div>".substr($mentorPdp[$i]['User']['statement'], 0, 20).'...'."</div>";
	     			echo "</div>";
	     			echo "</a>";
	     		} 

	     		if(count($mentorPdp) == 0) {
	     			echo "<span class='card sub-title'>No projects in progress</span>";
	     		}
	     	?>
	     </div>
	</div>
<?php } else if($userRole === 2) { ?>
	
<?php } else if($userRole === 3) { ?>
	
<?php } ?>