<?php

class DepartmentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLoad($id)
	{
		$id_branch = (int)$id;

		$model = new Department;
		$model->unsetAttributes();

		$departmens = $model->findAllByAttributes(array('id_branch'=>$id_branch));

		echo CJSON::encode($departmens);
	}

	public function actionShow($id)
	{
		$id_department = (int)$id;

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_department=:id_department');
		$criteria->params = array(':id_department'=>$id_department);
	
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