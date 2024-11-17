<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>

<h1>Create Popup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>