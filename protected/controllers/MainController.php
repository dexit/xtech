<?php

class MainController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		/*if (!isset($user)) {
			$this->render('index');
		}*/

		$org = new Organization('search');
		$org->unsetAttributes();  // clear any default values		
		$organizations = $org->findAll();

		$dev = new Device('search');
		$dev->unsetAttributes();

		$rel = array('devicepc','devicetype','organization', 'branch', 'department','cabinet', 'employee');
		//$devices = $dev->with('devicepc','devicetype','organization', 'branch', 'department','cabinet', 'employee')->findAll();
		$devices = $dev->with($rel)->findAll();

		//echo "<pre>";
		//var_dump($organizations);
		//echo "</pre>";

		$this->render('index',array(
			'organizations'=>$organizations,
			'devices'=>$devices,
		));
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/*public function actionAjaxFillTree()
	{
		if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }

        /*$data = array(
			    	array(
			        'text' => 'Node 1',
			        'expanded' => false, // будет развернута ветка или нет (по умолчанию)
			            'children' => array(
			                 array('text' => 'Node 1.111111',),   
			                 array('text' => 'Node 1.2',),   
			                 array('text' => 'Node 1.3',),             
			            )
			    	),
			    	array(
			        'text' => 'Node 1',
			        'expanded' => false, // будет развернута ветка или нет (по умолчанию)
			            'children' => array(
			                 array('text' => 'Node 1.111111',),   
			                 array('text' => 'Node 1.2',),   
			                 array('text' => 'Node 1.3',),             
			            )
			    	),
				);*/
		/*$org = new Organization('search');
		$org->unsetAttributes();
		$organizations = $org->findAll();

		$bran = new Branch('search');
		$bran->unsetAttributes();
		$branches = $bran->findAll();



		$data = array();
		foreach ($organizations as $organization) {
			$data[] = array(
						'text' => CHtml::link($organization->name,'?r=device/show&id_organization='.$organization->id_organization),
			        	'expanded' => false,
			        	'children' => $branches,			        		
			            );
		}

		
		
		echo CTreeView::saveDataAsJson($data);
		exit();
	}*/
}