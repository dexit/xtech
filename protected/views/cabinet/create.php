<?php
/* @var $this CabinetController */
/* @var $model Cabinet */

/*$this->breadcrumbs=array(
	'Cabinets'=>array('index'),
	'Create',
);*/

/*$this->menu=array(
	array('label'=>'List Cabinet', 'url'=>array('index')),
	array('label'=>'Manage Cabinet', 'url'=>array('admin')),
);*/
?>

<h1>Створити кабінет</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'parent' => $parent)); ?>