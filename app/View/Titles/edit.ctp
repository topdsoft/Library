<div class="titles form">
<?php echo $this->Form->create('Title');?>
	<fieldset>
		<legend><?php echo __('Edit Title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('publisher_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('shelf_id');
		echo $this->Form->input('year');
		echo $this->Form->input('notes');
		echo $this->Form->input('isbn');
		echo $this->Form->input('Author');
		echo $this->Form->input('Tag');
		echo $this->Form->input('own');
		echo $this->Form->input('read');
		echo $this->Form->input('want');
		echo $this->Form->input('rating');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Title.id')), null, __('Are you sure you want to delete title: %s?', $this->Form->value('Title.name'))); ?></li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add', $this->Form->value('Title.id'))); ?> </li>
	</ul>
</div>
