<div class="publishers form">
<?php echo $this->Form->create('Publisher');?>
	<fieldset>
		<legend><?php echo __('Add Publisher'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>