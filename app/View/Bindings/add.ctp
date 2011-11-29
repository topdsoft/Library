<div class="bindings form">
<?php echo $this->Form->create('Binding');?>
	<fieldset>
		<legend><?php echo __('Add Binding'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>