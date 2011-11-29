<div class="series form">
<?php echo $this->Form->create('Series');?>
	<fieldset>
		<legend><?php echo __('Add Series'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>