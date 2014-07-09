<?php
/* @var $this DeviceController */
/* @var $model Device */

/*$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->name=>array('view','id'=>$model->id_device),
	'Update',
);

$this->menu=array(
	array('label'=>'List Device', 'url'=>array('index')),
	array('label'=>'Create Device', 'url'=>array('create')),
	array('label'=>'View Device', 'url'=>array('view', 'id'=>$model->id_device)),
	array('label'=>'Manage Device', 'url'=>array('admin')),
);*/
?>

<h1>Змінити дані пристрою <?php echo $model->devicetype->name.": "; echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>