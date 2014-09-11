<?php
//var_dump($dataProvider);
$this->widget('zii.widgets.grid.CGridView', array(
      'dataProvider'=>$dataProvider,
      'pager' => array(
          //'pageSize' => '20',
          'maxButtonCount'=>'10',
          'header'=>'',
          'firstPageLabel'=>'Перша',
          'prevPageLabel'=>'Попередня',
          'nextPageLabel'=>'Наступна',
          'lastPageLabel'=>'Остання',
      ),
      'itemsCssClass'=>'table-striped',
      'columns'=>array(
            /*array(
              'name' => 'Організація',
              'type' => 'raw',
              //'value' => '$data->organization->name',
              'value' => '(isset($data->employee->cabinet->department->branch->organization->name))?
                          $data->employee->cabinet->department->branch->organization->name:\'Не визначено\'',
            ),*/
            array(
              'name' => 'Філія',
              'type' => 'raw',
              //'value' => '$data->branch->name',
              'value' => '(isset($data->employee->cabinet->department->branch->name))?
                           $data->employee->cabinet->department->branch->name:\'Не визначено\'',
            ),
            array(
              'name' => 'Відділ',
              'type' => 'raw',
              //'value' => '$data->department->name',
              'value' => '(isset($data->employee->cabinet->department->name))?
                          $data->employee->cabinet->department->name:\'Не визначено\'',
            ),
            array(
              'name' => 'Кабінет',
              'type' => 'raw',
              //'value' => '$data->cabinet->number',
              'value' => '(isset($data->employee->cabinet->number))?
                          $data->employee->cabinet->number:\'Не визначено\'',
            ),
            array(
              'name' => 'Співробітник',
              'type' => 'raw',
              'value' => '(isset($data->employee->firstname))?$data->employee->firstname:\'Не визначено\'',
            ),
            array(
              'name' => 'Пристрій',
              'type' => 'raw',
              'value' => '$data->devicetype->name',
            ),
            array(
              'name' => 'Інв №',
              'type' => 'raw',
              'value' => '$data->inv_number',
            ),
            array(
              'name' => 'Назва',
              'type' => 'raw',
              'value' => '$data->name',
            ),
            array(
              'name' => 'Серійний №',
              'type' => 'raw',
              'value' => '$data->sn',
            ),            
            array(
              'name' => 'Рік випуску',
              'type' => 'raw',
              'value' => '$data->year',
            ),
            array(
              'name' => 'Забаланс',
              'type' => 'raw',
              'value' => '$data->private ? \'Так\' : \'Ні\'',
            ),
            array(
              'name' => 'Стан',
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
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити даний пристрій?'",
                  ),
                ),
            ),

      ),

  ));

?>