<?php

class DeviceTypeController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLoad($id)
	{
		$id_employee = (int)$id;

		/*$model = new DeviceType;
		$model->unsetAttributes();

		$device_type = $model->findAllByAttributes(array('id_device'=>$id_device));*/
		$d = new Device('search');
		$d->unsetAttributes();
		$device = $d->with(array('devicetype'))->findAllByAttributes(array('id_employee'=>$id_employee));

		if ($device) {
			foreach ($device as $d){
	    		//$dt[] = array($d->devicetype->id_device_type,$d->devicetype->name);
	    		$dt[] = $d->devicetype->name;
			}

			$dta = array_count_values($dt);

			echo CJSON::encode($dta);
		} else {
			return false;
		}
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