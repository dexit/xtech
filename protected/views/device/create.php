<?php
/* @var $this DeviceController */
/* @var $model Device */

/*$this->breadcrumbs=array(
	'Devices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Device', 'url'=>array('index')),
	array('label'=>'Manage Device', 'url'=>array('admin')),
);*/
?>

<h1>Додати пристрій</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>