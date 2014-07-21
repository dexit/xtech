<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->id_employee,
);

$this->menu=array(
	array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'Update Employee', 'url'=>array('update', 'id'=>$model->id_employee)),
	array('label'=>'Delete Employee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_employee),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<h1>View Employee #<?php echo $model->id_employee; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_employee',
		'id_organization',
		'id_branch',
		'id_department',
		'id_cabinet',
		'firstname',
		'lastname',
		'surname',
		'description',
		'telephones',
		'post',
		'email',
		'login',
		'tab_number',
		'home_address',
		'dob',
		'pasp',
		'fired',
		'dof',
	),
)); ?>
