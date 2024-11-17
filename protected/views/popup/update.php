<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Create Popup', 'url'=>array('create')),
	array('label'=>'View Popup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>

<h1>Update Popup <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>