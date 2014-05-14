<?php
/* @var $this OrganizationController */
/* @var $data Organization */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_organization')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_organization), array('view', 'id'=>$data->id_organization)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephones')); ?>:</b>
	<?php echo CHtml::encode($data->telephones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emails')); ?>:</b>
	<?php echo CHtml::encode($data->emails); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('www')); ?>:</b>
	<?php echo CHtml::encode($data->www); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('boss')); ?>:</b>
	<?php echo CHtml::encode($data->boss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buh')); ?>:</b>
	<?php echo CHtml::encode($data->buh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('okpo')); ?>:</b>
	<?php echo CHtml::encode($data->okpo); ?>
	<br />

	*/ ?>

</div>