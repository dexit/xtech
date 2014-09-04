<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'device-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_employee'); ?>
		<?php $list = CHtml::listData(Employee::model()->findAll(),'id_employee', 'firstname');?>
		<?php echo $form->dropDownList($model,'id_employee',$list, array(
									'options'=>array(
												$model->id_employee=>array(
															'selected'=>'selected')))
										); ?>
		<?php echo $form->error($model,'id_employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type'); ?>
		<?php $list = CHtml::listData(DeviceType::model()->findAll(),'id_device_type', 'name');?>
		<?php echo $form->dropDownList($model,'id_type',$list, array(
									'options'=>array(
												$model->id_type=>array(
															'selected'=>'selected')),
									'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>46, 'rows'=>5, 'maxlength'=>255)); ?>
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
		<?php  
			$yearNow = date("Y");
			$yearFrom = 1980;
			$arrYears = array();
			foreach (range($yearFrom, $yearNow) as $number) {
		 		$arrYears[$number] = $number; 
		 	}
		 	$arrYears = array_reverse($arrYears, true);
		?>
		<?php //echo $form->textField($model,'year'); ?>
		<?php echo $form->dropDownList($model,'year',$arrYears); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_varantly_yesr'); ?>
		<?php  
			$yearNow = date("Y");
			$yearTo = $yearNow + 5;
			$yearFrom = 1985;
			$arrYears = array();
			foreach (range($yearFrom, $yearTo) as $number) {
		 		$arrYears[$number] = $number; 
		 	}
		 	$arrYears = array_reverse($arrYears, true);
		?>
		<?php //echo $form->textField($model,'end_varantly_yesr'); ?>
		<?php echo $form->dropDownList($model,'end_varantly_yesr',$arrYears); ?>
		<?php echo $form->error($model,'end_varantly_yesr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service'); ?>
		<?php echo $form->textField($model,'service',array('cols'=>46, 'rows'=>5, 'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expluatation'); ?>
		<?php echo $form->dropDownList($model,'expluatation', array('0'=>'Ні','1'=>'Так'), array(
									'options'=>array(
												$model->expluatation=>array(
															'selected'=>'selected')))
										); ?>
		<?php echo $form->error($model,'expluatation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expluatation_data'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    			'model' => $model,
	    			'attribute' => 'expluatation_data',
	    			'language' => 'uk',
	    			'options' => array(
	    				'size' => '10',
	    				'dateFormat' => 'yy-mm-dd',
	    				'showButtonPanel' => true,
	    				'changeYear' => true,           // can change year
				        'changeMonth' => true,
				        'showOtherMonths' => true,      // show dates in other months
				        'selectOtherMonths' => true,
	    				),
				));
		?>
		<?php echo $form->error($model,'expluatation_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private'); ?>
		<?php echo $form->dropDownList($model,'private', array('0'=>'Ні','1'=>'Так'), array(
									'options'=>array(
												$model->private=>array(
															'selected'=>'selected')))
										); ?>

		<?php echo $form->error($model,'private'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'break'); ?>
		<?php echo $form->dropDownList($model,'break', array('0'=>'Працює','1'=>'Не працює'), array(
									'options'=>array(
												$model->break=>array(
															'selected'=>'selected')))
										); ?>

		<?php echo $form->error($model,'break'); ?>
	</div>

	<div class="row">
		<?php //var_dump($devicepc); ?>
		<?php echo $form->labelEx($model,'mb'); ?>
		<?php echo $form->textField($model->devicepc,'mb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'mb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpu_name'); ?>
		<?php echo $form->textField($model->devicepc,'cpu_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'cpu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpu_p'); ?>
		<?php echo $form->textField($model->devicepc,'cpu_p',array('size'=>8,'maxlength'=>10)); ?>
		<?php echo $form->error($model->devicepc,'cpu_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hdd_name'); ?>
		<?php echo $form->textField($model->devicepc,'hdd_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'hdd_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hdd_p'); ?>
		<?php echo $form->numberField($model->devicepc,'hdd_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'hdd_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ram_name'); ?>
		<?php echo $form->textField($model->devicepc,'ram_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'ram_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ram_p'); ?>
		<?php echo $form->numberField($model->devicepc,'ram_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'ram_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_name'); ?>
		<?php echo $form->textField($model->devicepc,'video_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'video_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_p'); ?>
		<?php echo $form->numberField($model->devicepc,'video_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'video_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cdrom_name'); ?>
		<?php echo $form->textField($model->devicepc,'cdrom_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'cdrom_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lan_name'); ?>
		<?php echo $form->textField($model->devicepc,'lan_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'lan_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'os'); ?>
		<?php echo $form->textField($model->devicepc,'os',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'os'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'net_name'); ?>
		<?php echo $form->textField($model->devicepc,'net_name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'net_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model->devicepc,'ip',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model->devicepc,'ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->