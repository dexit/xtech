<?php

$this->renderPartial('construct_form');
if ($result) {
    $this->renderPartial('construct_result', array('result'=>$result));
}

?>