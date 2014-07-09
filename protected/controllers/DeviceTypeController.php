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

		$d = new Device('search');
		$d->unsetAttributes();
		$device = $d->with(array('devicetype'))->findAllByAttributes(array('id_employee'=>$id_employee));

		if ($device) {
			foreach ($device as $d){
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

	public function actionShowByEmployee($id_obj,$id_emp)
	{
		$devicetype_name = $id_obj;
		$id_employee = (int)$id_emp;

		$criteria_devtype = new CDbCriteria();
		$criteria_devtype->addCondition('name=:name');
		$criteria_devtype->params = array(':name'=>$devicetype_name);
		$id_type = DeviceType::model()->find($criteria_devtype)->id_device_type;

		$criteria = new CDbCriteria();
		$criteria->condition = 'id_employee=:id_employee';
		$criteria->addCondition('id_type=:id_type','AND');
		$criteria->params = array(':id_employee'=>$id_employee,
								  ':id_type'=>$id_type);

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
}