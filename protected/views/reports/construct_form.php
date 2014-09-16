<?php
$columns = Device::model()->getAttributes();
$operations = array('='=>'=','>'=>'>','<'=>'<','LIKE'=>'Умова', 'IN'=>'В списку');
?>
<div class="notifier">
    При пошуку з "Умовою" можливо використовувати спеціальні символи:
    <span>%</span> (будь яка кількість символів),
    <span>_</span> (один символ).
</div>
    <div class="notifier">
        При пошуку "В списку" значення треба розділити комами.
    </div>
<?php
echo CHtml::beginForm($this->createUrl('construct'),'post');
echo "<table>";
?>
<thead>
    <tr>
        <td>Вибір</td>
        <td>Сортування</td>
        <td>Рядок</td>
        <td>Умова</td>
        <td>Значення</td>
    </tr>
</thead>
<?php
foreach ($columns as $k=>$v)
{
    echo "<tr>";
        echo "<td>";
            echo CHtml::checkBox('attr['.$k.']','',array('value'=>$k));
        echo "</td>";
        echo "<td>";
            echo CHtml::radioButtonList('sort','',
                    array($k.'_DESC'=>'Зменшення',$k.'_ASC'=>'Збільшення'));
        echo "</td>";
        echo "<td>";
            echo $k;
        echo "</td>";
        echo "<td>";
            echo CHtml::dropDownList('operations['.$k.']',$k,$operations);
        echo "</td>";
        echo "<td>";
            getFieldValue($k,$v);
        echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo CHtml::submitButton('Пошук');
echo CHtml::endForm();


function getFieldValue($k, $v){
    if ($k == 'id_employee') {
        $list = CHtml::listData(Employee::model()->findAll(),'id_employee', 'firstname');
        echo CHtml::dropDownList('value['.$k.']','firstname',$list,
                        array('empty' => '--Вибір--'));
    }
    elseif ($k == 'id_type') {
        $list = CHtml::listData(DeviceType::model()->findAll(),'id_device_type', 'name');
        echo CHtml::dropDownList('value['.$k.']','name',$list,
                        array('empty' => '--Вибір--'));
    }
    elseif ($k == 'expluatation') {
        echo CHtml::dropDownList('value['.$k.']','',array('0'=>'Ні','1'=>'Так'),
                        array('empty' => '--Вибір--'));
    }
    elseif ($k == 'private') {
        echo CHtml::dropDownList('value['.$k.']','',array('0'=>'Ні','1'=>'Так'),
                        array('empty' => '--Вибір--'));
    }
    elseif ($k == 'break') {
        echo CHtml::dropDownList('value['.$k.']','',array('0'=>'Ні','1'=>'Так'),
                        array('empty' => '--Вибір--'));
    }
    /*elseif ($k == 'expluatation_data') {
        Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'model' => Device::model('search'),
            //'attribute' => 'expluatation_data',
            'name'=>'value['.$k.']',
            'language' => 'uk',
            'options' => array(
                'size' => '10',
                'dateFormat' => 'dd-mm-yy',
                'showButtonPanel' => true,
                'changeYear' => true,           // can change year
                'changeMonth' => true,
                'showOtherMonths' => true,      // show dates in other months
                'selectOtherMonths' => true,
            ),
        ));
    }*/
    else {
        echo CHtml::textField('value['.$k.']','',array('size'=>60,'maxlength'=>255));
    }
}