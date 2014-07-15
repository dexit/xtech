<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'cabinet-grid',
        'dataProvider'=>$cabinet,
        //'filter'=>$branch,
        'columns'=>array(
            'number',
            array(
                'name' => 'Відділ',
                'value' => '$data->department->name',
                'type' => 'html',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Перегляд',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("cabinet/view", array("id"=>$data->id_cabinet))',
                  ),
                  'update' => array(
                    'label'=>'Редагувати',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("cabinet/update", array("id"=>$data->id_cabinet))',
                  ),
                  'delete' => array(
                    'label'=>'Видалити',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("cabinet/delete", array("id"=>$data->id_cabinet))',
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити цей запис?'",
                  ),
                ),
            ),
        ),
    ));
?>
