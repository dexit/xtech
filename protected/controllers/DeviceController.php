<?php

class DeviceController extends Controller
{
	public function actionIndex()
	{
		$this->render('admin');
	}

	public function actionLoad($id)
	{
		$id_employee = (int)$id;

		$model = new Device;
		$model->unsetAttributes();

		$device = $model->findAllByAttributes(array('id_employee'=>$id_employee));

		echo CJSON::encode($device);
	}

	public function actionShow()
	{
		$this->render('index');
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