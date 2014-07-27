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

<div class='row'>
	<?php if($this->Session->read('Auth.User.role') == 'mentor') { ?>
	<div id="panel2" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns big-padding">
	        	<div class="large-6 small-8 large-offset-3 small-offset-2 columns card">
	        		<div class="large-12 small-12 columns">
		        		<label class="topic-header">Statement</label>
		        		<p><?php echo $myPdp['Post']['statement']; ?></p>
		        	</div>
		        	<div class="large-12 small-12 columns">
		        		<label class="topic-header">Description</label>
		        		<p><?php echo $myPdp['Post']['description']; ?></p>
		        	</div>
		        	
	        		<div class="large-6 small-12 columns">
		        		<?php echo $this->Form->input('objective', array('type' => 'textarea', 'value' => $myPdp['Post']['objective'])); ?>
		        	</div>
		        	<div class="large-6 small-12 columns">
		        		<?php echo $this->Form->input('plan', array('type' => 'textarea', 'value' => $myPdp['Post']['objective'])); ?>
		        	</div>

		        	<div class="large-12 small-12 columns">
			        	<a <?php echo 'href="../createMeeting/'.$myPdp['Post']['id'].'"' ?>><label>Next Meeting</label></a>
			        	<?php if(count($myPdp['Meeting']) > 0) { ?>
				        	<div class="large-12 small-12 columns">
				        		<label class="topic-header">
				        			Next Meeting on <?php echo $myPdp['Meeting']['time']; ?> via 
				        			<?php echo $myPdp['Meeting']['venue']; ?>
				        		</label>
				        	</div>
			        	<?php } ?>
			        </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    <?php } ?>
</div>