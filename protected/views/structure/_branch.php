<?php
    //TODO child grid of cascade view
    /*
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'branch-grid',
    'dataProvider'=>$branch->searchIncludingPermissions($org_parentID),
    'filter'=>$branch,
    'columns'=>array(
        'name',        
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));*/

    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'branch-grid',
        'dataProvider'=>$branch,
        'columns'=>array(
            'name',
            array(
                'name' => 'Організація',
                'value' => '$data->organization->name',
                'type' => 'html',
            ),
            array(
              'class'=>'CButtonColumn',
              'template'=>'{view}{update}{delete}',
              'buttons'=>array(
                  'view' => array(
                    'label'=>'Перегляд',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url'=>'Yii::app()->createUrl("branch/view", array("id"=>$data->id_branch))',
                  ),
                  'update' => array(
                    'label'=>'Редагувати',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
                    'url'=>'Yii::app()->createUrl("branch/update", array("id"=>$data->id_branch))',
                  ),
                  'delete' => array(
                    'label'=>'Видалити',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url'=>'Yii::app()->createUrl("branch/delete", array("id"=>$data->id_branch))',
                    'deleteConfirmation'=>"js:'Ви дійсно бажаєте видалити цей запис?'",
                  ),
                ),
            ),
        ),
    ));
?>
