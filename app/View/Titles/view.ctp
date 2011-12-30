<div class="titles view">
<h2><?php  echo __('Title');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($title['Title']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($title['Title']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($title['Title']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo $this->Html->link($title['Series']['name'], array('controller' => 'series', 'action' => 'view', $title['Series']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Binding'); ?></dt>
		<dd>
			<?php echo $this->Html->link($title['Binding']['name'], array('controller' => 'bindings', 'action' => 'view', $title['Binding']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publisher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($title['Publisher']['name'], array('controller' => 'publishers', 'action' => 'view', $title['Publisher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($title['Category']['name'], array('controller' => 'categories', 'action' => 'view', $title['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shelf'); ?></dt>
		<dd>
			<?php echo $this->Html->link($title['Shelf']['name'], array('controller' => 'shelves', 'action' => 'view', $title['Shelf']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($title['Title']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($title['Title']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isbn'); ?></dt>
		<dd>
			<?php echo h($title['Title']['isbn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Own'); ?></dt>
		<dd>
			<?php echo ($title['Title']['own'] ? 'Y' : 'N'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Read'); ?></dt>
		<dd>
			<?php echo ($title['Title']['read'] ? 'Y' : 'N'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Want'); ?></dt>
		<dd>
			<?php echo ($title['Title']['want'] ? 'Y' : 'N'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php 
				if(is_null($title['Title']['rating'])) echo'(not rated)';
				else for($i=1; $i<=5; $i++) echo $this->Html->image(($title['Title']['rating']>=$i) ? 'onstar.png' : 'offstar.png',array('width'=>22)); 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($title['Title']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php
		if(!empty($title['Tag'])) {
			//show tags
			echo '<br><h3>Tags</h3>';
			foreach ($title['Tag'] as $tag) echo $this->Html->link($tag['name'], array('controller'=>'tags','action'=>'view',$tag['id'])).' ';
		}//endif for tags
	?>
</div>
<?php echo $this->element('menu');?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Title'), array('action' => 'edit', $title['Title']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Title'), array('action' => 'delete', $title['Title']['id']), null, 
			__('Are you sure you want to delete title: %s?', $title['Title']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add', $title['Title']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($title['Author'])):?>
	<h3><?php echo __('Related Authors');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('LastName'); ?></th>
		<th><?php echo __('FirstName'); ?></th>
		<th><?php echo __('Titles'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($title['Author'] as $author): ?>
		<tr>
			<td><?php echo $author['id'];?></td>
			<td><?php echo $author['lastName'];?></td>
			<td><?php echo $author['firstName'];?></td>
			<td><?php echo $author['titles'];?></td>
			<td><?php echo $author['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'authors', 'action' => 'view', $author['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'authors', 'action' => 'edit', $author['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

