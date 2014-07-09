<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */

//var_dump($model);
?>

<div class="row">
		<?php echo $form->labelEx($model,'mb'); ?>
		<?php echo $form->textField($model,'mb',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'mb'); ?>
</div>