<?php if (count($organizations)): ?>    
<?php  
  $count = count($organizations);
  //var_dump($count);IsLast
  $i = 0;
?>
  
    <ul class="Container">
      <?php foreach ($organizations as $organization): ?>
      <?php 
          if ($i == ($count-1)) {$class = "IsLast";}
          elseif ($i == 0) {$class = "IsFirst";}

          $i++;
      ?>
        <li class="Node IsRoot ExpandClosed <?php echo $class; ?>" 
            id="org-<?php echo $organization->id_organization; ?>">
          <div class="Expand"></div>
          <input type="checkbox"/>
          <div class="Content">
            <?php  
              echo CHtml::ajaxLink($organization->name,
                                Controller::createUrl('dev/show', 
                                              array('id'=>$organization->id_organization,)),
                                array('update' => '#data-grid'));?> 
          
          </div>
        </li> 
      <?php endforeach; ?>
    </ul>

  <div id="show_all" class="buttons">
  <?php echo CHtml::ajaxButton ("Show all devices",
                              CController::createUrl('dev/showAll'), 
                              array('update' => '#data-grid'));?>  
  </div>                            

<?php else: ?>  
  <span>Нет организаций</span>
<?php endif; ?>  
  
