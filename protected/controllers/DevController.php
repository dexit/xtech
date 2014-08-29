<?php

class DevController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
        $dataProvider = DevShowGrid::getData('t_organizations', (int)$id);

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