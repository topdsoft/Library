<div class="authors view">
<h2><?php  echo __('Author');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($author['Author']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
			<?php echo h($author['Author']['lastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($author['Author']['firstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($author['Author']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('# of Titles'); ?></dt>
		<dd>
			<?php echo h($author['Author']['titles']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu');?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Author'), array('action' => 'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Title'), array('controller' => 'titles', 'action' => 'add', $author['Author']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($author['Title'])):?>
	<h3><?php echo __('Related Titles');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Publisher'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Shelf'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Isbn'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		$publishers[0]=null;
		$categories[0]=null;
		$shelves[0]=null;
		foreach ($author['Title'] as $title): ?>
		<tr>
			<td><?php echo $title['id'];?></td>
			<td><?php echo $title['name'];?></td>
			<td><?php echo $title['created'];?></td>
			<td><?php echo $publishers[$title['publisher_id']];?></td>
			<td><?php echo $categories[$title['category_id']];?></td>
			<td><?php echo $shelves[$title['shelf_id']];?></td>
			<td><?php echo $title['year'];?></td>
			<td><?php echo $title['notes'];?></td>
			<td><?php echo $title['isbn'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'titles', 'action' => 'view', $title['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'titles', 'action' => 'edit', $title['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'titles', 'action' => 'delete', $title['id']), null, __('Are you sure you want to delete # %s?', $title['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
