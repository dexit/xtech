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

        $criteria->condition = '';
        $criteria->addInCondition('id_organization', array($id_organization), 'AND');
        $branches = Branch::model()->findAll($criteria);
        foreach ($branches as $b){
            $branch[] = $b->id_branch;
        }

        $criteria->condition = '';
        $criteria->addInCondition('id_branch', $branch, 'AND');
        $departmens = Department::model()->findAll($criteria);
        foreach ($departmens as $d){
            $department[] = $d->id_department;
        }

		//$criteria->addCondition('id_organization=:id_organization');
		//$criteria->params = array(':id_organization'=>$id_organization);


        var_dump($department);
        $dataProvider = new CActiveDataProvider('Device',array('criteria'=>$criteria));
        //var_dump($dataProvider);
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