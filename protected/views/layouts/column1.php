<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div id="tabs">
<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
    'activateParents' => true
));
?>
</div>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>