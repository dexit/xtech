<?php
/* @var $this StructureController */

/*$this->breadcrumbs=array(
	'Structure',
);*/

//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/grid_update.js');

?>
<? /*
<h1>Структура</h1>

<div id="parentView">
    <?php 
		$this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'organization-grid',
            'dataProvider'=>$organization->search(),
            'filter'=>$organization,
            'columns'=>array(
                'name',
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
            'ajaxUpdate' => 'branch-grid', 
            'afterAjaxUpdate' => "updateChild",
        	'selectionChanged'=> "updateChild",
        ));
    ?>
</div>

<div id="branch-grid">
    <?php
        $this->renderPartial('_branch', array(
        'branch' => $branch, 
        'org_parentID' => $org_parentID, 
        ))
    ?>
</div>
*/?>
<h1>Структура</h1>

<h2>Підприємства</h2>
<div id="organization-grid">
    <?php
        $this->renderPartial('_organization', array(
        	'organization' => $organization, 
        ))
    ?>
</div>

<h2>Філії</h2>
<div id="branch-grid">
    <?php
        $this->renderPartial('_branch', array(
        	'organization' => $organization, 
        	'branch' => $branch, 
        ))
    ?>
</div>

<h2>Відділи</h2>
<div id="department-grid">
    <?php
        $this->renderPartial('_department', array(
        	'department' => $department, 
        ))
    ?>
</div>

<h2>Кабінети</h2>
<div id="cabinet-grid">
    <?php
        $this->renderPartial('_cabinet', array(
        	'cabinet' => $cabinet, 
        ))
    ?>
</div>

<h2>Співробітники</h2>
<div id="employee-grid">
    <?php
        $this->renderPartial('_employee', array(
        	'employee' => $employee, 
        ))
    ?>
</div>