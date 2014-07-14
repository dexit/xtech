<?php
/* @var $this DeviceController */
/* @var $model Device */
/* @var $form CActiveForm */
$model->unsetAttributes();
$model_pc->unsetAttributes();
//CVarDumper::dump($model_pc,10,true);
//var_dump($model);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/select.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'device-form-create',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'id_organization'); ?>
		<?php $list = CHtml::listData(Organization::model()->findAll(),'id_organization', 'name');?>
		<?php echo $form->dropDownList($model,'id_organization',$list, array(
											'ajax'=>array(
													'type'=>'POST',
													'url'=>Yii::app()->createUrl('branch/loadbyorganization'),
													'update'=>'#Device_id_branch',
													'data'=>array('id_organization'=>'js:this.value'),
													),
											'empty'=>'Виберіть організацію',
										)); ?>
		<?php echo $form->error($model,'id_organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_branch'); ?>		
		<?php echo $form->dropDownList($model,'id_branch',array(), array(
										'ajax'=>array(
													'type'=>'POST',
													'url'=>Yii::app()->createUrl('department/loadbybranch'),
													'update'=>'#Device_id_department',
													'data'=>array('id_branch'=>'js:this.value'),
													),
										'empty'=>'Виберіть корпус'
									)
										); ?>
		<?php echo $form->error($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_department'); ?>
		<?php //echo $form->textField($model,'id_department'); ?>
		<?php //$list = CHtml::listData(Department::model()->findAll(),'id_department', 'name');?>
		<?php echo $form->dropDownList($model,'id_department',array(), array(
									'ajax'=>array(
													'type'=>'POST',
													'url'=>Yii::app()->createUrl('cabinet/loadbydepartment'),
													'update'=>'#Device_id_cabinet',
													'data'=>array('id_department'=>'js:this.value'),
													),
									'empty'=>'Виберіть відділ')
										); ?>
		<?php echo $form->error($model,'id_department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cabinet'); ?>
		<?php //echo $form->textField($model,'id_cabinet'); ?>
		<?php //$list = CHtml::listData(Cabinet::model()->findAll(),'id_cabinet', 'number');?>
		<?php echo $form->dropDownList($model,'id_cabinet',array(), array(
									'ajax'=>array(
													'type'=>'POST',
													'url'=>Yii::app()->createUrl('employee/loadbycabinet'),
													'update'=>'#Device_id_employee',
													'data'=>array('id_cabinet'=>'js:this.value'),
													),
									'empty'=>'Виберіть кабінет')
										); ?>
		<?php echo $form->error($model,'id_cabinet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_employee'); ?>
		<?php //echo $form->textField($model,'id_employee'); ?>
		<?php //$list = CHtml::listData(Employee::model()->findAll(),'id_employee', 'firstname');?>
		<?php echo $form->dropDownList($model,'id_employee',array(), array(
										'empty'=>'Виберіть кабінет')
										); ?>
		<?php echo $form->error($model,'id_employee'); ?>
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
		<?php echo $form->textArea($model,'service',array('cols'=>46, 'rows'=>5, 'maxlength'=>255)); ?>
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
		<?php echo $form->labelEx($model_pc,'mb'); ?>
		<?php echo $form->textField($model_pc,'mb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'mb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'cpu_name'); ?>
		<?php echo $form->textField($model_pc,'cpu_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'cpu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'cpu_p'); ?>
		<?php echo $form->textField($model_pc,'cpu_p',array('size'=>8,'maxlength'=>10)); ?>
		<?php echo $form->error($model_pc,'cpu_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'hdd_name'); ?>
		<?php echo $form->textField($model_pc,'hdd_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'hdd_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'hdd_p'); ?>
		<?php echo $form->numberField($model_pc,'hdd_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'hdd_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'ram_name'); ?>
		<?php echo $form->textField($model_pc,'ram_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'ram_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'ram_p'); ?>
		<?php echo $form->numberField($model_pc,'ram_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'ram_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'video_name'); ?>
		<?php echo $form->textField($model_pc,'video_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'video_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'video_p'); ?>
		<?php echo $form->numberField($model_pc,'video_p',array('size'=>8,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'video_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'cdrom_name'); ?>
		<?php echo $form->textField($model_pc,'cdrom_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'cdrom_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'lan_name'); ?>
		<?php echo $form->textField($model_pc,'lan_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'lan_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'os'); ?>
		<?php echo $form->textField($model_pc,'os',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'os'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'net_name'); ?>
		<?php echo $form->textField($model_pc,'net_name',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'net_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_pc,'ip'); ?>
		<?php echo $form->textField($model_pc,'ip',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model_pc,'ip'); ?>
	</div>

	<div class="row">
		<input type="hidden" id="Device_id_type" name="Device[id_type]" value="<?php echo $device_type ?>">
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->