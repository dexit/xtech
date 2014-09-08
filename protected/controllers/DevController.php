<?php

class DevController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
        /*$sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.id_device',
            'id_type'=>array(
                'asc'=>'t.id_type',
                'desc'=>'t.id_type DESC',
            ),
            'inv_number'=>array(
                'asc'=>'t.inv_number',
                'desc'=>'t.inv_number DESC',
            ),
        );*/
        $dataProvider = DevShowGrid::getData('t_organizations', (int)$id);
        //$dataProvider->sort = $sort;
        //$dataProvider->pagination->pageSize = 20;

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