<?php

class DepartmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Department;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_department));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_department));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
		$transaction = Yii::app()->db->beginTransaction();
		
		try {									
			//$branch = $this->loadModel($id);
				
			$department = $this->loadModel($id);				
			$cabinets = $department->cabinet;
				if ($cabinets) {
					foreach ($cabinets as $cabinet){						
						$employees = $cabinet->employee;
						if ($employees) {
							foreach ($employees as $employee) {
								$employee->id_organization = null;
								$employee->id_branch = null;
								$employee->id_department = null;
								$employee->id_cabinet = null;
								$employee->save();
							}
						}
						$cabinet->delete();
					}
				}
				$department->delete();
								
			$transaction->commit();
			
		} catch(Exception $e) { 
            		$transaction->rollback();
            		$error = $e->getMessage();
        }
		
		$this->redirect('?r=structure/index');	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Department');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Department the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Department::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Department $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
