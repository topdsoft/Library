<div class="authors form">
<?php echo $this->Form->create('Author');?>
	<fieldset>
		<legend><?php echo __('Edit Author'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lastName');
		echo $this->Form->input('firstName');
		echo $this->Form->input('Title',array('label'=>'Titles by this Author:'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Author.id')), null, __('Are you sure you want to delete author: %s?  Books by this author will not be deleted.', $this->Form->value('Author.name'))); ?></li>
		<li><?php echo $this->Html->link(__('New Title'), array('controller' => 'titles', 'action' => 'add',$this->Form->value('Author.id'))); ?> </li>
	</ul>
</div>
