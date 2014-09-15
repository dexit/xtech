<?php

//var_dump($result);
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$result,
    'columns'=>array(
        'id_device',
        'id_employee',
        'id_type',
        'name',
        'description',
        'inv_number',
        'sn',
        'year',
        'end_varantly_yesr',
        'service',
        'expluatation',
        'expluatation_data',
        'private',
        'break',
    ),
));