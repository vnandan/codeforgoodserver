<?php if($this->user_role == 0) { // Mentee ?>
	<div class='row'>
		<div class='large-12 small-12 columns'>
			<a class='large-6 small-6 columns' href='#panel1'>Post Problem</a>
			<a class='large-6 small-6 columns' href='#panel2'>My PDP</a>
		</div>
		<div id='panel1'>
			<?php
				echo $this->Form->create('Post');
				echo $this->Form->input('statement', array('type' => 'text', 'required' => true));
		        echo $this->Form->input('description', array('required' => true));
				echo $this->Form->end();
			?>
		</div>
		<div id='panel2'>

		</div>
	</div>
<?php } else if($this->user_role == 1) { ?>
	
<?php } else if($this->user_role == 2) { ?>
	
<?php } else if($this->user_role == 3) { ?>
	
}