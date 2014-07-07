<?php

class EmployeeController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLoad($id)
	{
		$id_cabinet = (int)$id;

		$model = new Employee;
		$model->unsetAttributes();

		$employee = $model->findAllByAttributes(array('id_cabinet'=>$id_cabinet));

		echo CJSON::encode($employee);
	}

	public function actionShow($id)
	{
		$id_employee = (int)$id;

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_employee=:id_employee');
		$criteria->params = array(':id_employee'=>$id_employee);
	
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