<div class="titles index">
	<h2><?php echo __('Titles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('publisher_id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('shelf_id');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('isbn');?></th>
			<th></th>
	</tr>
	<?php
	$i = 0;
	foreach ($titles as $title): ?>
	<tr>
		<td><?php echo h($title['Title']['id']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['name']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($title['Publisher']['name'], array('controller' => 'publishers', 'action' => 'view', $title['Publisher']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($title['Category']['name'], array('controller' => 'categories', 'action' => 'view', $title['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($title['Shelf']['name'], array('controller' => 'shelves', 'action' => 'view', $title['Shelf']['id'])); ?>
		</td>
		<td><?php echo h($title['Title']['year']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['isbn']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $title['Title']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $title['Title']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $title['Title']['id']), null, __('Are you sure you want to delete # %s?', $title['Title']['id'])); ?>
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