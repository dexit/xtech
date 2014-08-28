<?php
    //var_dump($employee->data[0]->cabinet->number);
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'employee-grid',
        'dataProvider'=>$employee,
        'columns'=>array(
            'firstname',            
            'lastname',
            'surname',
            array(
                'name' => 'Кабінет',
                //'value' => '$data->cabinet->number',
                //'value' => '$data->cabinet->number',//todo
                //'value' => 'count($data->cabinet)',
                //'value' => '$data->getRelated(\'cabinet\')->number',
                'type' => 'html',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Перегляд',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("employee/view", array("id"=>$data->id_employee))',
                  ),
                  'update' => array(
                    'label'=>'Редагувати',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("employee/update", array("id"=>$data->id_employee))',
                  ),
                  'delete' => array(
                    'label'=>'Видалити',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("employee/delete", array("id"=>$data->id_employee))',
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити цей запис?'",
                  ),
                ),
            ),
        ),
    ));
?>

<div>
  <?php echo CHtml::link('Додати співробітника', Yii::app()->createUrl('employee/create')); ?>
</div>
