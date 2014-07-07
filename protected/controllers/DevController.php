<?php

class DevController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
		$id_organization = (int)$id;
		$criteria = new CDbCriteria();
		$criteria->addCondition('id_organization=:id_organization');
		$criteria->params = array(':id_organization'=>$id_organization);

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

	public function actionShowAll()
	{		
		$dataProvider = new CActiveDataProvider('Device');

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