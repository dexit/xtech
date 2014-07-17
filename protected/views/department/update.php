<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Структура'=>array('structure/index'),
	$model->name=>array('view','id'=>$model->id_department),
	'Редагувати',
);

/*$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'View Department', 'url'=>array('view', 'id'=>$model->id_department)),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);*/
?>

<h1>Редагувати дані відділу</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>