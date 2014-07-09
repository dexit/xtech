<?php 
  $this->widget('zii.widgets.grid.CGridView', array(
      'dataProvider'=>$dataProvider,
      'columns'=>array(
            array(
              'name' => 'Организация',
              'type' => 'raw',
              'value' => '$data->organization->name',
            ),
            array(
              'name' => 'Подразделение',
              'type' => 'raw',
              'value' => '$data->branch->name',
            ),
            array(
              'name' => 'Отдел',
              'type' => 'raw',
              'value' => '$data->department->name',
            ),
            array(
              'name' => 'Кабинет',
              'type' => 'raw',
              'value' => '$data->cabinet->number',
            ),
            array(
              'name' => 'Сотрудник',
              'type' => 'raw',
              'value' => '$data->employee->firstname',
            ),
            array(
              'name' => 'Устройство',
              'type' => 'raw',
              'value' => '$data->devicetype->name',
            ),
            array(
              'name' => 'Инв номер',
              'type' => 'raw',
              'value' => '$data->inv_number',
            ),
            array(
              'name' => 'Название',
              'type' => 'raw',
              'value' => '$data->name',
            ),
            array(
              'name' => 'Серийный',
              'type' => 'raw',
              'value' => '$data->sn',
            ),            
            array(
              'name' => 'Год выпуска',
              'type' => 'raw',
              'value' => '$data->year',
            ),
            array(
              'name' => 'Забалансовий',
              'type' => 'raw',
              'value' => '$data->private ? \'Так\' : \'Ні\'',
            ),
            array(
              'name' => 'Состояние',
              'type' => 'raw',
              'value' => '$data->break ? \'Не працює\' : \'Працює\'',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Просмотр',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("device/view", array("id"=>$data->id_device))',
                  ),
                  'update' => array(
                    'label'=>'Изменить',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("device/update", array("id"=>$data->id_device))',
                  ),
                  'delete' => array(
                    'label'=>'Удалить',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("device/delete", array("id"=>$data->id_device))',
                    'deleteConfirmation'=>"js:'Record will be deleted! Continue?'",
                  ),
                ),
            ),

      ),

  ));

?>