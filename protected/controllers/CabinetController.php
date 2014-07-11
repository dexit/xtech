<?php

class CabinetController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLoad($id)
	{
		$id_department = (int)$id;

		$model = new Cabinet;
		$model->unsetAttributes();

		$cabinets = $model->findAllByAttributes(array('id_department'=>$id_department));

		echo CJSON::encode($cabinets);
	}

	public function actionShow($id)
	{
		$id_cabinet = (int)$id;

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_cabinet=:id_cabinet');
		$criteria->params = array(':id_cabinet'=>$id_cabinet);
	
		$dataProvider = new CActiveDataProvider('Device',array('criteria'=>$criteria));

		if (Yii::app()->request->isAjaxRequest) {
      		$this->renderPartial('//main/_device', array(
        		'dataProvider' => $dataProvider),
        		false,
        		true	
      		);
      		Yii::app()->end();
    	}
	}

	public function actionLoadByDepartment()
	{
		$id_department = (int)$_POST['id_department'];
		$cabinet = Cabinet::model()->findAll('id_department=:id_department',
											array('id_department'=>$id_department));

		 $list = CHtml::listData($cabinet,'id_cabinet','number');

		echo "<option value=''>Виберіть кабінет</option>";
   		foreach($list as $value=>$cabinet_number)
   			echo CHtml::tag('option', array('value'=>$value),
   									  CHtml::encode($cabinet_number),true);
	}		
}