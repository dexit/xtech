<?php
/* @var $this OrganizationController */

$this->breadcrumbs=array(
	'Organization',
);

  $this->renderPartial('//main/_device', array(
    'dataProvider' => $dataProvider,
    'grid_id' => $grid_id,
  ));
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
