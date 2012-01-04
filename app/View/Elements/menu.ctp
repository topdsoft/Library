<?php
function menu($obj,$controller,$contLabel,$items) {
	$activeController=($controller==$obj->request->params['controller']);
	if ($activeController) echo '<div style="border:1px solid #ededed;">';
	else echo '<div style="padding: 1px;">';
	echo "<strong>$contLabel</strong>";
	foreach($items as $i) {
		//loop for al links in menu block
		if($activeController && $obj->request->params['action']==$i['action']) $div='style="background: #ededed;"';
		else $div='';
		echo "<li $div>".$obj->Html->link(__($i['label']), array('controller' => $controller, 'action' => $i['action'])).'</li>';
	}
	echo '</div>';
}
?>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<?php 
			menu($this,'titles','Titles',array(array('label'=>'List Titles','action'=>'index'),array('label'=>'New Title','action'=>'add')));
			menu($this,'authors','Authors',array(array('label'=>'List Authors','action'=>'index'),array('label'=>'New Author','action'=>'add')));
			menu($this,'bindings','Bindings',array(array('label'=>'List Bindings','action'=>'index'),array('label'=>'New Binding','action'=>'add')));
			menu($this,'categories','Categories',array(array('label'=>'List Categories','action'=>'index'),array('label'=>'New Category','action'=>'add')));
			menu($this,'series','Series',array(array('label'=>'List Series','action'=>'index'),array('label'=>'New Series','action'=>'add')));
			menu($this,'publishers','Publishers',array(array('label'=>'List Publishers','action'=>'index'),array('label'=>'New Publisher','action'=>'add')));
			menu($this,'shelves','Shelves',array(array('label'=>'List Shelves','action'=>'index'),array('label'=>'New Shelf','action'=>'add')));
			menu($this,'tags','Tags',array(array('label'=>'List Tags','action'=>'index'),array('label'=>'New Tag','action'=>'add')));
			menu($this,'users','User Setup',array(array('label'=>'Download','action'=>'download'),array('label'=>'Options','action'=>'edit')));
		?>
	</ul>
</div>
<?php //debug($this->request->params['controller'])?>