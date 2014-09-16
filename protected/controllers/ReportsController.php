<?php

class ReportsController extends Controller
{
	public function actionIndex() 
	{
		$this->render('index',array());
	}

    public function actionConstruct()
    {
        $result = null;
        if (Yii::app()->request->requestType == 'POST') {
            $request = Yii::app()->request->getRestParams();
            $result = Device::model()->construct($request);
        }

        Yii::app()->session['construct_result'] = $result;

        $this->render('construct',
                array(
                    'result'=>$result,
                ));
    }

    public function actionExport(){
        $dataProvider = Yii::app()->session['construct_result'];
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("JazzzDima")
            ->setLastModifiedBy("JazzzDima")
            ->setTitle("Результати запиту")
            ->setSubject("Результати запиту")
            ->setDescription("Вивантаження даних")
            ->setKeywords("вивантаження облік техніки")
            ->setCategory("Вивантаження");

        $objPHPExcel->getActiveSheet()->setTitle('Вивантаження');

        /*$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Привет')
            ->setCellValue('B1', 'Мир!');*/

        foreach ($dataProvider->data as $obj) {
            $data[] = $obj->getAttributes();
        }
        //var_dump($data);
        $i = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $j = 1;
        $z = 1;
        foreach ($data as $d) {
            foreach ($d as $k=>$v) {
                $objPHPExcel->getActiveSheet()
                    ->setCellValue($i[$j-1].$z, $v);
                //var_dump($i[$j-1].$z, $v);
                $j++;
            }
            $z++;
        }

        $filename = date("Y-m-d-H-i-s");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        //$objWriter->save('php://output');
        $objWriter->save('d:\\'.$filename.'.xls');
        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
        //var_dump($objPHPExcel);

    }
}