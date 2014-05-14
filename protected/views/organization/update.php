<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->name=>array('view','id'=>$model->id_organization),
	'Update',
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'View Organization', 'url'=>array('view', 'id'=>$model->id_organization)),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h1>Update Organization <?php echo $model->id_organization; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>