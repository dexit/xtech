<?php 

  //$dataProvider=new CActiveDataProvider('Device');

  $this->widget('zii.widgets.grid.CGridView', array(
      //'id' => 'device-grid',
      'dataProvider'=>$dataProvider,
      //'ajaxUpdate'=>'',
      //'ajaxUrl' => array('dev/show'),
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
              //'value' => '$data->private',
              'value' => '$data->private ? \'Так\' : \'Ні\'',
            ),
            array(
              'name' => 'Состояние',
              'type' => 'raw',
              'value' => '$data->break ? \'Не працює\' : \'Працює\'',
            ),

      ),
  ));

?>