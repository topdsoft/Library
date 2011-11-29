<div class="publishers index">
	<h2><?php echo __('Publishers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('titles');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($publishers as $publisher): ?>
	<tr>
		<td><?php echo h($publisher['Publisher']['id']); ?>&nbsp;</td>
		<td><?php echo h($publisher['Publisher']['name']); ?>&nbsp;</td>
		<td><?php echo h($publisher['Publisher']['titles']); ?>&nbsp;</td>
		<td><?php echo h($publisher['Publisher']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $publisher['Publisher']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $publisher['Publisher']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $publisher['Publisher']['id']), null, 
				__('Are you sure you want to delete publisher: %s? (No titles will be deleted)', $publisher['Publisher']['name'])); ?>
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