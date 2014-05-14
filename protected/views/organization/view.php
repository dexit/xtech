<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Update Organization', 'url'=>array('update', 'id'=>$model->id_organization)),
	array('label'=>'Delete Organization', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_organization),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h1>View Organization #<?php echo $model->id_organization; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_organization',
		'name',
		'description',
		'telephones',
		'emails',
		'www',
		'address',
		'boss',
		'buh',
		'okpo',
	),
)); ?>
