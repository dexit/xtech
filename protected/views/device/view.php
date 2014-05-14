<?php
/* @var $this DeviceController */
/* @var $model Device */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Device', 'url'=>array('index')),
	array('label'=>'Create Device', 'url'=>array('create')),
	array('label'=>'Update Device', 'url'=>array('update', 'id'=>$model->id_device)),
	array('label'=>'Delete Device', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_device),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Device', 'url'=>array('admin')),
);
?>

<h1>View Device #<?php echo $model->id_device; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_device',
		'id_organization',
		'id_branch',
		'id_department',
		'id_cabinet',
		'id_employee',
		'id_type',
		'name',
		'description',
		'inv_number',
		'sn',
		'year',
		'end_varantly_yesr',
		'service',
		'expluatation',
		'expluatation_data',
		'private',
		'break',
	),
)); ?>
