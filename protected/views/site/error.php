<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Ошибка';
$this->breadcrumbs = array(
	'Ошибка',
);
?>

<h2>Ошибка <?php echo (!empty($code)) ? $code : ''; ?></h2>

<div class="error">
<?php echo (!empty($message)) ? CHtml::encode($message) : ''; ?>
</div>