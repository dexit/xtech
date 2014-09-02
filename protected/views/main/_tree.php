<?php
    Yii::app()->clientScript->registerScript('tree-menu', '
        $("[class ^= tree-menu-button-] a").live("click",function(event){
            event.preventDefault();

            controller = $(this).parent().attr("class").split("-")[3];

            //console.log(controller);
            id = $(this).parent().parent().attr("id").split("-")[1];
            //console.log(id);
            //p = $(this).parent().parent().attr("id");
            p = $(this).parent().parent().parent().parent().attr("id").split("-")[1];
            console.log(p);

            $(".tree-menu ul li.tree-menu-add a").attr("href",
                                        "?r="+controller+"/create&parent="+p+"");
            $(".tree-menu ul li.tree-menu-edit a").attr("href",
                                        "?r="+controller+"/update&id="+id+"");
            $(".tree-menu ul li.tree-menu-delete a").attr("href",
                                        "?r="+controller+"/delete&id="+id+"");

            $(".tree-menu").css("left",10+event.pageX+"px").css("top",event.pageY+"px");

            $(".tree-menu ul li.tree-menu-add").toggleClass("show");
            $(".tree-menu ul li.tree-menu-edit").toggleClass("show");
            $(".tree-menu ul li.tree-menu-delete").toggleClass("show");

            $(".tree-menu").toggleClass("show");
        });
    ', CClientScript::POS_READY);
?>

<?php if (count($organizations)): ?>
<?php  
  $count = count($organizations);
  $i = 0;
?>
    <div>Організації</div>
    <!--<div class="tree-menu-button"><a href="#">+</a></div>-->
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
          <!--<input type="checkbox"/>-->
          <div class="tree-menu-button-organization"><a href="#"></a></div>
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
  <?php echo CHtml::ajaxButton ("Всі пристрої",
                              CController::createUrl('dev/showAll'), 
                              array('update' => '#data-grid'));?>  
  </div>                            

<?php else: ?>  
  <span>Нет организаций</span>
<?php endif; ?>  
  
<div class="tree-menu">
    <ul>
        <li class="tree-menu-add"><a href="#">Додати</a></li>
        <li class="tree-menu-edit"><a href="#">Редагувати</a></li>
        <li class="tree-menu-delete">
             <?php echo CHtml::link('Видалити', '#',
                    array('submit'=>array('delete','id'=>''),
                          'confirm'=>'Ви впевнені?')); ?>
        </li>
    </ul>
    <div><a href="#" onClick="//$(this).removeClass('show');">X</a></div>
</div>