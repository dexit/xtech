<?php

class ReportsController extends Controller
{
	public function actionIndex() 
	{
		$this->render('index',array());
	}

    public function actionConstruct()
    {
        $this->render('construct',array());
    }
}