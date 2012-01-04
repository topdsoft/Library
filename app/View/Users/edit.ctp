<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('type'=>'hidden'));
		echo $this->Form->input('password',array('type'=>'hidden'));
		echo $this->Form->input('email');
		echo $this->Form->input('titleLimit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>