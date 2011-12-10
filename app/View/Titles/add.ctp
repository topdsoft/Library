<div class="titles form">
<?php echo $this->Form->create('Title');?>
	<fieldset>
		<legend><?php echo __('Add Title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Author',array('label'=>'Select Authors:'));
		echo '<fieldset><legend>'.__('Add a New Author').'</legend>';
		echo $this->Form->input('in.firstName');
		echo $this->Form->input('in.lastName');
		echo '</fieldset>';
		echo $this->Form->input('publisher_id');
		echo $this->Form->input('in.pub',array('label'=>'New Publisher'));
		echo $this->Form->input('category_id');
		echo $this->Form->input('in.cat',array('label'=>'New Category'));
		echo $this->Form->input('binding_id');
		echo $this->Form->input('in.bind',array('label'=>'New Binding'));
		echo $this->Form->input('series_id');
		echo $this->Form->input('in.ser',array('label'=>'New Series'));
		echo $this->Form->input('shelf_id');
		echo $this->Form->input('in.shl',array('label'=>'New Shelf'));
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