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
	        	
	        	<?php echo $this->Form->Create('Post'); ?>
        		<div class="large-6 small-12 columns">
	        		<label class="topic-header">Objective</label>
	        		<?php echo $this->Form->input('objective', array('type' => 'textarea', 'value' => $myPdp['Post']['objective'])); ?>
	        	</div>
	        	<div class="large-6 small-12 columns">
	        		<label class="topic-header">Plan</label>
	        		<?php echo $this->Form->input('plan', array('type' => 'textarea', 'value' => $myPdp['Post']['plan'])); ?>
	        	</div>

	        	<div class="large-12 small-12 columns">
	        		<label class="topic-header"><a <?php echo 'href="createMeeting/'.$myPdp['Post']['id'].'"' ?>>Next Meeting</a></label>
	        		<?php if(count($myPdp['Post']['Meeting']) > 0) { ?>
		        		<label class="topic-header">
		        			On <?php echo $myPdp['Post']['Meeting']['time']; ?> via 
		        			<?php echo $myPdp['Post']['Meeting']['venue']; ?>
		        		</label>
		        	<?php } ?>
				</div>
        	</div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>