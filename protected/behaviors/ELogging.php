<?php

class ELogging extends CActiveRecordBehavior {

    public $model_before;
    public $model;
    public $id;

    public function afterSave($event)
    {
        $this->model_before = Device::model()->findByPk($this->id);
        $this->model = $this->owner;
        //$modelBefore = Yii::app()->session['model_before'];
        var_dump($this->model);
        var_dump($this->model_before);
        //echo "save ".$this->model;
    }

    public function afterFind($event)
    {
        //Yii::app()->session['model_before'] = $this->owner;
        $this->id = $this->owner->id_device;
        //$this->model_before = Device::model()->findByPk($id);
        //var_dump($this->model);
        //echo "find ".$this->model;
    }
}