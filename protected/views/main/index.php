<section id="left_col">

<div  id="tree">
  <ul class="Container">
<?php foreach ($organizations as $organization) { ?>
    <li class="Node IsRoot ExpandClosed IsLast" 
        id="org-<?php echo $organization->id_organization; ?>">
      <div class="Expand"></div>
      <input type="checkbox"/>
      <div class="Content">
          <?php /*<a href="?r=organization/show&id=<?php echo $organization->id_organization; ?>">
                              <?php echo $organization->name; ?></a>*/?>
          <?php  
              echo CHtml::ajaxLink(
                            $organization->name,
                            Controller::createUrl('dev/show', array('id'=>$organization->id_organization,)),
                            array('update' => '#data-grid')
                        );
          ?> 
          
      </div>
    </li> 
<?php } ?>
  </ul>
</div>

<?php echo CHtml::ajaxButton ("Show all devices",
                              CController::createUrl('dev/showAll'), 
                              array('update' => '#data-grid'));
?>                   
</section> <!-- end of left_col -->
  
<section id="right_col">

<div id="data-grid">
<?php 
  $this->renderPartial('_device', array(
                      'dataProvider' => $dataProvider,
                      false,
                      true
      ));

?>
</div>
</section> <!-- end of right_col -->

<div id="loader"><span>Загрузка...</span></div>


<div style="clear:both;"></div>


