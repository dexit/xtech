<?php

class DepartmentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLoad($id)
	{
		$id_branch = (int)$id;

		$model = new Department;
		$model->unsetAttributes();

		$departmens = $model->findAllByAttributes(array('id_branch'=>$id_branch));

		echo CJSON::encode($departmens);
	}

	public function actionShow($id)
	{
		$id_department = (int)$id;

		$criteria = new CDbCriteria();
		$criteria->addCondition('id_department=:id_department');
		$criteria->params = array(':id_department'=>$id_department);
	
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

	public function actionLoadByBranch()
	{
		$id_branch = (int)$_POST['id_branch'];
		$department = Department::model()->findAll('id_branch=:id_branch',
											array('id_branch'=>$id_branch));

		 $list = CHtml::listData($department,'id_department','name');

		echo "<option value=''>Виберіть відділ</option>";
   		foreach($list as $value=>$department_name)
   			echo CHtml::tag('option', array('value'=>$value),
   									  CHtml::encode($department_name),true);
	}	
}