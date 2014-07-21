<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
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
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephones'); ?>
		<?php echo $form->textField($model,'telephones',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telephones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tab_number'); ?>
		<?php echo $form->textField($model,'tab_number'); ?>
		<?php echo $form->error($model,'tab_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_address'); ?>
		<?php echo $form->textField($model,'home_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'home_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pasp'); ?>
		<?php echo $form->textField($model,'pasp',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pasp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fired'); ?>
		<?php echo $form->textField($model,'fired'); ?>
		<?php echo $form->error($model,'fired'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dof'); ?>
		<?php echo $form->textField($model,'dof'); ?>
		<?php echo $form->error($model,'dof'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->