
<section>
<div id="org-grid">
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
			  'dataProvider'=> new CActiveDataProvider('Organization'),
			  'columns' => array(      
				   'name',
				   'telephones',
				   'emails',
				   'www',
				   'address',
				   'okpo',
				   array(
    					'class'=>'CButtonColumn',
    					'template'=>'{view}{update}{delete}',
    					'buttons'=>array(
        					'view' => array(
            					'label'=>'Send an e-mail to this user',
					            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
					            'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
        					),
        					'down' => array(
					            'label'=>'[-]',
					            'url'=>'"#"',
					            'visible'=>'$data->score > 0',
					            'click'=>'function(){alert("Going down!");}',
					        ),),
					),
    		),)
);

?>
</div>
<div>
	<?php echo CHtml::link("Add organization",
                              	CController::createUrl('organization/create'));
	?>  
</div>
</section>