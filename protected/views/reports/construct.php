<?php
//var_dump(Yii::app()->db->getSchema());

//var_dump(Device::model()->getAttributes());

$columns = Device::model()->getAttributes();

echo "<table>";
foreach ($columns as $k=>$v) {
    echo "<tr>";
        echo "<td>";
            echo CHtml::checkBox('attr['.$k.']');
        echo "</td>";
        echo "<td>";
           echo $k;
        echo "</td>";
        echo "<td>";

        echo "</td>";
        echo "<td>";

        echo "</td>";
    echo "</tr>";
}
echo "</table>";


?>