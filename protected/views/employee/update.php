<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->id_employee=>array('view','id'=>$model->id_employee),
	'Update',
);

$this->menu=array(
	array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'View Employee', 'url'=>array('view', 'id'=>$model->id_employee)),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<h1>Update Employee <?php echo $model->id_employee; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>