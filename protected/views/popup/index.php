<?php
/* @var $this PopupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Popups',
);

$this->menu=array(
	array('label'=>'Create Popup', 'url'=>array('create')),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>

<h1>Popups</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'popup-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'active',
        'name',
        'content',
        'seen',
        array('value'=>'$data->link'),
    ),
)); ?>
