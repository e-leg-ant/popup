<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$this->menu=array(
    array('label'=>'PopUp', 'url'=>array('/popup/index')),
);
?>

<h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<script src="http://local.test.ru/popup/widget.js?id=1"></script>