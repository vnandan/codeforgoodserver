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

<?php if($userRole === 'mentee')
{
	?>
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
	        	<div class="large-6 small-8 large-offset-3 small-offset-2 columns card">
	        		<div class="large-12 small-12 columns">
	        			<button id="dropButton" <?php echo 'postid="'.$myPdp['Post']['id'].'"' ?> class="button tiny alert right">Drop</button>
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
		        		<label class="topic-header">Objective</label>
		        		<p><?php echo $myPdp['Post']['objective']; ?></p>
		        	</div>
		        	<div class="large-6 small-12 columns">
		        		<label class="topic-header">Plan</label>
		        		<p><?php echo $myPdp['Post']['plan']; ?></p>
		        	</div>

		        	<?php if(count($myPdp['Meeting']) > 0) { ?>
			        	<div class="large-12 small-12 columns">
			        		<label class="topic-header">
			        			Next Meeting on <?php echo $myPdp['Meeting']['time']; ?> via 
			        			<?php echo $myPdp['Meeting']['venue']; ?>
			        		</label>
			        	</div>
		        	<?php } ?>

		        	<div class="row">
					    <div class="large-12 small-12 columns">
				        	<?php
				        		$user_id = $this->Session->read('Auth.User.id');
				        		foreach($messages as $msg) {
				        			echo "<div class='large-12 small-12 columns'>";
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
	    <?php 
	    }	//END MENTEE USER INTERPHASE.
	     ?>
	</div>
<?php } else if($userRole === 'mentor') { ?>
	<div class="large-12 small-12 columns dashboard-tabs">
      <ul class="left">
        <li class="active">Search Problems</li>
      </ul>
      <ul class="right">
        <li><a href="logout">Logout</a></li>
      </ul>
    </div>
	<div class="row clear-fix"></div>
	<div class='row'>
		<div class="large-8 small-12 columns">
			<form class="	search-form" method="post" action="dashboard">
				<input type="text" id="searchBox" name="search">
        		<input type="submit" value="Search">
        	</form>
        	<div>
        		<?php 
        			for($i=0; $i<count($recPosts); $i++) {
        				?>
        					<div class="large-12 small-12 columns card margin">
        						<div class="large-10 small-10 columns">
        							<div class='post-title'><?php echo $recPosts[$i]['p']['statement']; ?></div>
        							<div class='post-desc'><?php echo substr($recPosts[$i]['p']['description'], 0, 20)."..."; ?></div>	
        						</div>
        						<div class="large-2 small-2 columns">
        							<a <?php echo 'href="/codeforgoodserver/posts/acceptMentee/'.$recPosts[$i]['p']['id'].'"' ?>><span class="button primary small">Yes!</span></a>
        						</div>
        					</div>
        				<?php
        			}
        		?>
        	</div>
	     </div>
	     <div class="large-4 small-12 columns">
	     	<?php 
	     		// debug($myMentees);
	     		for($i=0; $i<count($myMentees); $i++) {
	     			echo "<a href='/codeforgoodserver/posts/view/".$myMentees[$i]['Post']['id']."'>";
	     			echo "<div class='large-12 small-12 columns card'>";
	     			echo "<div>".$myMentees[$i]['User']['name']."</div>";
	     			echo "<div>".substr($myMentees[$i]['Post']['statement'], 0, 20).'...'."</div>";
	     			echo "</div>";
	     			echo "</a>";
	     		} 

	     		if(count($myMentees) == 0) {
	     			echo "<span class='card sub-title'>No projects in progress</span>";
	     		}
	     	?>
	     </div>
	</div>
<?php } else if($userRole === 2) { ?>
	
<?php } else if($userRole === 3) { ?>
	
<?php } ?>