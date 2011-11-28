<div class="authors form">
<?php echo $this->Form->create('Author');?>
	<fieldset>
		<legend><?php echo __('Add Author'); ?></legend>
	<?php
		echo $this->Form->input('lastName');
		echo $this->Form->input('firstName');
//		echo $this->Form->input('Title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>