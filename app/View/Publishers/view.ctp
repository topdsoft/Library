<div class="publishers view">
<h2><?php  echo __('Publisher');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($publisher['Publisher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($publisher['Publisher']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titles'); ?></dt>
		<dd>
			<?php echo h($publisher['Publisher']['titles']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($publisher['Publisher']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu');?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Publisher'), array('action' => 'edit', $publisher['Publisher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Title'), array('controller' => 'titles', 'action' => 'add', $publisher['Publisher']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($publisher['Title'])):?>
	<h3><?php echo __('Related Titles');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Author'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($publisher['Title'] as $title): ?>
		<tr>
			<td><?php echo $title['id'];?></td>
			<td><?php echo $title['name'];?></td>
			<td><?php echo $title['author'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'titles', 'action' => 'view', $title['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'titles', 'action' => 'edit', $title['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
