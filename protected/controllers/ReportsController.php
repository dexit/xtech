<?php

class ReportsController extends Controller
{
	public function actionIndex() 
	{
		$this->render('index',array());
	}

    public function actionConstruct()
    {
        //$request = null;
        $result = null;
        if (Yii::app()->request->requestType == 'POST') {
            $request = Yii::app()->request->getRestParams();
            $device = new Device();
            //$device->setScenario('construct');
            //$result = $device->construct($request);
            $result = Device::model()->construct($request);
            var_dump($result);
            break;

        }
        $this->render('construct',
                array(
                        //'request'=>$request,
                        'result'=>$result
                ));
    }
}