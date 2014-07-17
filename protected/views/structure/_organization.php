<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'organization-grid',
        'dataProvider'=>$organization,
        'columns'=>array(
            'name',
            'address',
            array(
              'name'=> 'Кількість філій',
              'value'=>'count($data->branch)',
              'type'=>'html',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Перегляд',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->id_organization))',
                  ),
                  'update' => array(
                    'label'=>'Редагувати',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("organization/update", array("id"=>$data->id_organization))',
                  ),
                  'delete' => array(
                    'label'=>'Видалити',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("organization/delete", array("id"=>$data->id_organization))',
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити цей запис?'",
                  ),
                ),
            ),
        ),
    ));
?>

<div>
  <?php echo CHtml::link('Додати організацію', Yii::app()->createUrl('organization/create')); ?>
</div>