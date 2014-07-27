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
	      	<?php //debug($myPdp); ?>
	        <div class="large-12 columns big-padding">
	        	<div class="large-6 small-8 large-offset-3 small-offset-2 columns card">
	        		<div class="large-12 small-12 columns">
	        			<button id="dropButton" <?php echo 'postid="'.$myPdp['Post']['id'].'"' ?> class="button tiny alert right">Drop</button>
	        			<button id="completeButton" <?php echo 'postid="'.$myPdp['Post']['id'].'"' ?> class="button tiny success right">Complete</button>
	        		</div>
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
				        			on <?php echo $myPdp['Meeting'][count($myPdp['Meeting'])-1]['time']; ?> via 
				        			<?php echo $myPdp['Meeting'][count($myPdp['Meeting'])-1]['venue']; ?>
				        		</label>
				        	</div>
			        	<?php } ?>
			        </div>

			        <div class="large-12 small-12 columns">
			        	<label class="topic-header">Duration : 3 months</label>
			        </div>

			        <div class="row">
				        <div class="large-12 small-12 columns">
				        	<?php
				        		$user_id = $this->Session->read('Auth.User.id');
				        		foreach($messages as $msg) {
				        			echo "<div class='large-12 small-12 columns '>";
				        			if($msg['Message']['user_id'] == $user_id) {
				        				echo "<div class='large-8 small-8 large-offset-4 small-offset-4 columns chat-message right-text'>";
				        			} else {
				        				echo "<div class='large-8 small-8 columns chat-message left-text'>";
				        			}
				        			echo $msg['Message']['message'];
				        			echo "</div>";
				        			echo "</div>";
				        		}
				        	?>
				        	<div class='clear-fix'></div><br/>
				        	<form id="form1">
				        		<input type="text" id="chatMessage" name="message">
				        		<input type="hidden" id="postId" <?php echo 'value="'.$myPdp['Post']['id'].'"'; ?>>
				        		<input type="hidden" name="from" value="1">
				        		<input type="submit" id="submitChat" value="Send">
				        	</form>
				        </div>
				    </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    <?php } ?>
</div>