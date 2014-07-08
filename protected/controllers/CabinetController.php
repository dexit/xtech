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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}