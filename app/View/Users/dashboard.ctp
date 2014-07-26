<?php if($this->user_role == 0) { // Mentee ?>
	<div class='row'>
		<div class="large-12 small-12 columns dashboard-tabs">
	      <ul>
	        <li class="active"><a href="#panel1">Post Problem</a></li>
	        <li><a href="#panel2">My PDP</a></li>
	      </ul>
	    </div>
	    <div id="panel1" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns">
	          PANEL1
	        </div>
	      </div>
	    </div>
	    <div id="panel2" class="dashboard-tab-content">
	      <div class="row">
	        <div class="large-12 columns">
	          PANEL2
	        </div>
	      </div>
	    </div>
	</div>
<?php } else if($this->user_role == 1) { ?>
	
<?php } else if($this->user_role == 2) { ?>
	
<?php } else if($this->user_role == 3) { ?>
	
<?php } ?>