<?php
/* @var $this CabinetController */
/* @var $model Cabinet */

$this->breadcrumbs=array(
	'Структура'=>array('structure/index'),
	$model->id_cabinet,
);

/*$this->menu=array(
	array('label'=>'List Cabinet', 'url'=>array('index')),
	array('label'=>'Create Cabinet', 'url'=>array('create')),
	array('label'=>'Update Cabinet', 'url'=>array('update', 'id'=>$model->id_cabinet)),
	array('label'=>'Delete Cabinet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cabinet),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cabinet', 'url'=>array('admin')),
);*/
?>

<h1>Перегляд даних кабінету</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_cabinet',
		'number',
		//'id_department',
		array(
			'name' => 'Відділ',
            'value' => $model->department->name,
            'type' => 'html',
		),
		'description',
		'telephones',
	),
)); ?>
