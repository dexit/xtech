<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Структура'=>array('structure/index'),
	$model->name,
);

/*$this->menu=array(
	array('label'=>'List Branch', 'url'=>array('index')),
	array('label'=>'Create Branch', 'url'=>array('create')),
	array('label'=>'Update Branch', 'url'=>array('update', 'id'=>$model->id_branch)),
	array('label'=>'Delete Branch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_branch),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Branch', 'url'=>array('admin')),
);*/
?>

<h1>Перегляд даних філії</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_branch',
		'name',
		//'id_organization',
		array(
			'name'=>'Організація',
			'value'=>$model->organization->name,
			'type'=>'html',
		),
		'description',
		'telephones',
		'emails',
		'www',
		'address',
	),
)); ?>
