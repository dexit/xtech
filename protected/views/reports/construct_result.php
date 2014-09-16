<?php

//var_dump($result);

echo CHtml::ajaxLink('s',CController::createUrl('reports/export'));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$result,
    'pager' => array(
        'pageSize' => 100,
    ),
    'columns'=>array(
        'id_device',
        array(
            'name' => 'Співробітник',
            'type' => 'raw',
            'value' => '(isset($data->employee->firstname))?$data->employee->firstname:\'Не визначено\'',
        ),
        array(
            'name' => 'Тип',
            'type' => 'raw',
            'value' => '(isset($data->devicetype))?$data->devicetype->name:\'Не визначено\'',
        ),
        'name',
        'description',
        'inv_number',
        'sn',
        'year',
        'end_varantly_yesr',
        'service',
        array(
            'name' => 'Введено в експлуатацію',
            'type' => 'raw',
            'value' => '$data->expluatation ? \'Так\' : \'Ні\'',
        ),
        'expluatation_data',
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
    ),
));