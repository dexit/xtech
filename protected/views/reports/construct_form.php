<?php
$columns = Device::model()->getAttributes();
$operations = array('='=>'=','>'=>'>','<'=>'<');

echo CHtml::beginForm($this->createUrl('construct'),'post');
echo "<table>";
foreach ($columns as $k=>$v)
{
    echo "<tr>";
        echo "<td>";
            echo CHtml::checkBox('attr['.$k.']','',array('value'=>$k));
        echo "</td>";
        echo "<td>";
            echo $k;
        echo "</td>";
        echo "<td>";
            echo CHtml::dropDownList('operations['.$k.']',$k,$operations);
        echo "</td>";
        echo "<td>";
            //echo CHtml::textField('value['.$k.']','',array('size'=>60,'maxlength'=>255));
            getField($k,$v);
        echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo CHtml::submitButton('Пошук');
echo CHtml::endForm();


function getField($k, $v){
    if ($k == 'id_employee') {
        $list = CHtml::listData(Employee::model()->findAll(),'id_employee', 'firstname');
        echo CHtml::dropDownList('value['.$k.']','firstname',$list);
    }
    if ($k == 'id_type') {
        $list = CHtml::listData(DeviceType::model()->findAll(),'id_device_type', 'name');
        echo CHtml::dropDownList('value['.$k.']','name',$list);
    }
}