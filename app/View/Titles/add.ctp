<div class="titles form">
<?php echo $this->Form->create('Title');?>
	<fieldset>
		<legend><?php echo __('Add Title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Author');
		echo $this->Form->input('publisher_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('binding_id');
		echo $this->Form->input('series_id');
		echo $this->Form->input('shelf_id');
		echo $this->Form->input('year');
		echo $this->Form->input('notes');
		echo $this->Form->input('isbn');
		echo $this->Form->input('Tag');
		echo $this->Form->input('own');
		echo $this->Form->input('read');
		echo $this->Form->input('want');
		echo $this->Form->input('rating');
		echo $this->Form->input('form.referer',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>