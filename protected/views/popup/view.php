<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Create Popup', 'url'=>array('create')),
	array('label'=>'Update Popup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Popup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>

<h1>View Popup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'active',
		'name',
		'content',
		'seen',
	),
)); ?>
