<?php

class OrganizationController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
		$id_organization = (int)$id;

		/*$model = new Device;
		$model->unsetAttributes();

		$criteria = new CDbCriteria();
		//$criteria->addCondition(array('id_organization'=>$id_organization));
		$criteria->addCondition('id_organization=:id_organization');
		$criteria->params = array(':id_organization'=>$id_organization);
		//$devices = $model->findAllByAttributes(array('id_organization'=>$id_organization));

		$dataProvider = new CActiveDataProvider('Organization',array('criteria'=>$criteria));
		//var_dump($dataProvider);



		$this->render('index',array(
	        'dataProvider'=>$dataProvider,
	    ));
		$this->render('//main/index');
		//$this->renderFile();*/

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_organization=:id_organization');
		$criteria->params = array(':id_organization'=>$id_organization);

		$dataProvider = new CActiveDataProvider('Device',array('criteria'=>$criteria));

		$grid_id = 'device_grid';

		//if (Yii::app()->request->isAjaxRequest && isset($_GET['ajax']) && $_GET['ajax'] === $grid_id) {
		if (Yii::app()->request->isAjaxRequest) {
      		//var_dump($this);
      		$this->renderPartial('//main/_device', array(
        		'dataProvider' => $dataProvider,
        		'grid_id' => $grid_id,
        		false,
        		true
      		));
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