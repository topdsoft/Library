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
		echo $this->Form->input('form.referer',array('type'=>'hidden'));
		echo $this->Form->input('rating',array('id'=>'rating','type'=>'hidden'));
		//show rating stars
		echo 'Rating:<table style="width:300px;"><tr>';
		for ($i=0; $i<5; $i++) echo '<td><div class="tdBox">'.$this->Html->image('offstar.png',
			array('class'=>'L1','url'=>"javascript:rating(".($i+1).")",'style'=>'position:relative;')).$this->Html->image('onstar.png',
			array('class'=>'L1','url'=>"javascript:rating(".($i+1).")",'id'=>'on',
			'style'=>'display:none;')).'</div></td>';
		echo '</tr></table>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu');?>
<?php echo $this->Html->script(array('jquery-1.6.4.min','ratingstars.js'));?>
<style type='text/css'>
.tdBox { position:relative; padding:0;}
.L1 { position:absolute; top:0px; left:0px; z-index:1; }
</style>
