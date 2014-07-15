<?php

class BranchController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
		$id_branch = (int)$id;

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_branch=:id_branch');
		$criteria->params = array(':id_branch'=>$id_branch);
	
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

	public function actionLoad($id)
	{
		$id_organization = (int)$id;

		$model = new Branch;
		$model->unsetAttributes();

		$branches = $model->findAllByAttributes(array('id_organization'=>$id_organization));

		echo CJSON::encode($branches);
	}

	public function actionLoadByOrganization()
	{
		$id_organization = (int)$_POST['id_organization'];
		$branch = Branch::model()->findAll('id_organization=:id_organization',
											array('id_organization'=>$id_organization));

		 $list = CHtml::listData($branch,'id_branch','name');

		echo "<option value=''>Виберіть корпус</option>";
   		foreach($list as $value=>$branch_name)
   			echo CHtml::tag('option', array('value'=>$value),
   									  CHtml::encode($branch_name),true);
	}	
}