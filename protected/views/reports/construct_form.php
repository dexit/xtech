<?php
$columns = Device::model()->getAttributes();
$operations = array('='=>'=','>'=>'>','<'=>'<','!='=>'!=');


echo CHtml::beginForm($this->createUrl('construct'),'post');
echo "<table>";
foreach ($columns as $k=>$v) {
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
            echo CHtml::telField('value['.$k.']','',array('size'=>60,'maxlength'=>255));
        echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo CHtml::submitButton('Пошук');
echo CHtml::endForm();