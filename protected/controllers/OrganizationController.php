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

		$model = new Device;
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
		//$this->renderFile();
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