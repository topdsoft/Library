<div class="titles form">
<?php echo $this->Form->create('Title');?>
	<fieldset>
		<legend><?php echo __('Edit Title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
//		echo $this->Form->input('Author');
		echo '<fieldset><legend>'.__('Author Data').'</legend>';
//debug($this->Form->data);
		foreach($this->Form->data['Author'] as $author) {
			//loop for each current author
			echo '<strong>'.$author['name'].'<strong>';
			echo $this->Form->input('in.remove.'.$author['id'],array('type'=>'checkbox','label'=>'Remove'));
		}//end for each
		echo '<br><h4>'.__('Add a New Author:').'</h4>';
		echo $this->Form->input('in.firstName');
		echo $this->Form->input('in.lastName');
		echo __('Or select from a list:');
		echo $this->Form->input('author_id');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Title.id')), null, __('Are you sure you want to delete title: %s?', $this->Form->value('Title.name'))); ?></li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add', $this->Form->value('Title.id'))); ?> </li>
	</ul>
</div>
