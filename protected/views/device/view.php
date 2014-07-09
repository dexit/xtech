<?php
/* @var $this DeviceController */
/* @var $model Device */
/*
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
*/
//var_dump($model->organization->name);
?>

<h1>Данні пристрою <?php echo $model->devicetype->name.": "; echo $model->name; ?></h1>
<div id="device_info">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_device',
		//'id_organization',
		array(
			'name' => 'Організація',
			'type' => 'raw',
            'value' => $model->organization->name,          
		),
		array(
			'name' => 'Відділення',
			'type' => 'raw',
            'value' => $model->branch->name,          
		),
		//'id_branch',
		array(
			'name' => 'Відділ',
			'type' => 'raw',
            'value' => $model->department->name,          
		),
		//'id_department',
		array(
			'name' => 'Кабінет',
			'type' => 'raw',
            'value' => $model->cabinet->number,          
		),
		//'id_cabinet',
		array(
			'name' => 'Співробітник',
			'type' => 'raw',
            'value' => $model->employee->firstname." ".$model->employee->lastname." ".$model->employee->surname,          
		),
		//'id_employee',
		array(
			'name' => 'Тип пристрою',
			'type' => 'raw',
            'value' => $model->devicetype->name,          
		),
		//'id_type',
		'name',
		'description',
		'inv_number',
		'sn',
		'year',
		'end_varantly_yesr',
		'service',
		//'expluatation',
		array(
			'name' => 'Введення в експлуатацію',
			'type' => 'raw',
            'value' => ($model->expluatation)?"Введено":"Не введено",          
		),
		'expluatation_data',
		//'private',
		array(
			'name' => 'Забалансовий',
			'type' => 'raw',
            'value' => ($model->private)?"Так":"Ні",          
		),
		//'break',
		array(
			'name' => 'Стан',
			'type' => 'raw',
            'value' => ($model->private)?"Вийшов з ладу":"Працює",          
		),
	),
)); 


if ($model->devicetype->id_device_type == 2) {
	$this->renderPartial('_device_pc', array(
                      'model' => $model,));
}
?>
</div>