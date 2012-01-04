<div class="titles index">
<?php echo $this->Form->create('Title');?>
	<h2><?php echo __('Titles');?></h2>
	<input type="search" placeholder="Search titles..." results="10" name="searchtitle" value="<?php if(isset($searchtitle)) echo $searchtitle;?>"/>
	<input type="search" placeholder="Search authors..." results="10" name="searchauthor" value="<?php if(isset($searchauthor)) echo $searchauthor;?>"/>
	<input type="submit" name="dosearch" value="Search"/>
	<?php if(isset($results)) echo "Found $results matches for your search. ".$this->Html->link(__('Clear Search Results',true), array('action'=>'index'));?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('author');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('series_id');?></th>
			<th><?php echo $this->Paginator->sort('rating');?></th>
			<th><?php echo $this->Paginator->sort('shelf_id');?></th>
			<th></th>
	</tr>
	<?php
	$i = 0;//debug($titles);
	foreach ($titles as $title): ?>
	<tr>
		<td><?php echo h($title['Title']['id']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['author']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($title['Series']['name'], array('controller' => 'series', 'action' => 'view', $title['Series']['id'])); ?>
		</td>
		<td><?php echo h($title['Title']['rating']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($title['Shelf']['name'], array('controller' => 'shelves', 'action' => 'view', $title['Shelf']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $title['Title']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $title['Title']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $title['Title']['id']), null, __('Are you sure you want to delete title: %s?', $title['Title']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->element('menu');?>