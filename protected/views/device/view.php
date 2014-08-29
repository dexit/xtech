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
		array(
			'name' => 'Організація',
			'type' => 'raw',
            'value' => $model->employee->cabinet->department->branch->organization->name,
		),
		array(
			'name' => 'Відділення',
			'type' => 'raw',
            'value' => $model->employee->cabinet->department->branch->name,
		),
		array(
			'name' => 'Відділ',
			'type' => 'raw',
            'value' => $model->employee->cabinet->department->name,
		),
		array(
			'name' => 'Кабінет',
			'type' => 'raw',
            'value' => $model->employee->cabinet->number,
		),
		array(
			'name' => 'Співробітник',
			'type' => 'raw',
            'value' => $model->employee->firstname." ".$model->employee->lastname." ".$model->employee->surname,          
		),
		array(
			'name' => 'Тип пристрою',
			'type' => 'raw',
            'value' => $model->devicetype->name,          
		),
		'name',
		'description',
		'inv_number',
		'sn',
		'year',
		'end_varantly_yesr',
		'service',
		array(
			'name' => 'Введення в експлуатацію',
			'type' => 'raw',
            'value' => ($model->expluatation)?"Введено":"Не введено",          
		),
		'expluatation_data',
		array(
			'name' => 'Забалансовий',
			'type' => 'raw',
            'value' => ($model->private)?"Так":"Ні",          
		),
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