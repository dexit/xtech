<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'department-grid',
        'dataProvider'=>$department,
        'columns'=>array(
            'name',
            array(
                'name' => 'Філія',
                'value' => '$data->branch->name',
                'type' => 'html',
            ),
            array(
                'name' => 'Організація',
                'value' => '$data->branch->organization->name',
                'type' => 'html',
            ),
            array(
                'name' => 'Кількість кабінетів',
                'value' => 'count($data->cabinet)',
                'type' => 'html',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Перегляд',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("department/view", array("id"=>$data->id_department))',
                  ),
                  'update' => array(
                    'label'=>'Редагувати',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("department/update", array("id"=>$data->id_department))',
                  ),
                  'delete' => array(
                    'label'=>'Видалити',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("department/delete", array("id"=>$data->id_department))',
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити цей запис?'",
                  ),
                ),
            ),
        ),
    ));
?>

<div>
  <?php echo CHtml::link('Додати відділ', Yii::app()->createUrl('department/create')); ?>
</div>