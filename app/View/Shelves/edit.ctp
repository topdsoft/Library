<div class="shelves form">
<?php echo $this->Form->create('Shelf');?>
	<fieldset>
		<legend><?php echo __('Edit Shelf'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>
