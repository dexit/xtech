<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'device-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_organization'); ?>
		<?php echo $form->textField($model,'id_organization'); ?>
		<?php echo $form->error($model,'id_organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
		<?php echo $form->error($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_department'); ?>
		<?php echo $form->textField($model,'id_department'); ?>
		<?php echo $form->error($model,'id_department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cabinet'); ?>
		<?php echo $form->textField($model,'id_cabinet'); ?>
		<?php echo $form->error($model,'id_cabinet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_employee'); ?>
		<?php echo $form->textField($model,'id_employee'); ?>
		<?php echo $form->error($model,'id_employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type'); ?>
		<?php echo $form->textField($model,'id_type'); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_number'); ?>
		<?php echo $form->textField($model,'inv_number'); ?>
		<?php echo $form->error($model,'inv_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sn'); ?>
		<?php echo $form->textField($model,'sn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_varantly_yesr'); ?>
		<?php echo $form->textField($model,'end_varantly_yesr'); ?>
		<?php echo $form->error($model,'end_varantly_yesr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service'); ?>
		<?php echo $form->textField($model,'service',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expluatation'); ?>
		<?php echo $form->textField($model,'expluatation'); ?>
		<?php echo $form->error($model,'expluatation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expluatation_data'); ?>
		<?php echo $form->textField($model,'expluatation_data'); ?>
		<?php echo $form->error($model,'expluatation_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private'); ?>
		<?php echo $form->textField($model,'private'); ?>
		<?php echo $form->error($model,'private'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'break'); ?>
		<?php echo $form->textField($model,'break'); ?>
		<?php echo $form->error($model,'break'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->