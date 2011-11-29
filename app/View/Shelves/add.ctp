<div class="shelves form">
<?php echo $this->Form->create('Shelf');?>
	<fieldset>
		<legend><?php echo __('Add Shelf'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>
