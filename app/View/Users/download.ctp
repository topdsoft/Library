<div class="users view">
<h2><?php  __('Download myLibrary Data');?></h2>
<br>
This is a link to your .csv file which can be imported into most spreadsheet programs:<br>
<?php echo $this->Html->link(__('library.csv',true),"/files/library.csv")?><br><br>
For Open Office, open the file and use these options:<br><br>
<?php echo $this->Html->image('csv import.png');?>
</div>
<?php echo $this->element('menu');?>