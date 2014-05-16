<section id="left_col">

<div onclick="tree_toggle(arguments[0])">
<div>Root</div>
<ul class="Container">
  <li class="Node IsRoot ExpandOpen">
    <div class="Expand"></div>
    <input type="checkbox"/>
    <div class="Content">Item 1</div>
    <ul class="Container">
      <li class="Node ExpandOpen">
        <div class="Expand"></div>
        <input type="checkbox"/>
        <div class="Content">Item 1.1 </div>
        <ul class="Container">
          <li class="Node ExpandLeaf IsLast">
            <div class="Expand"></div>
            <input type="checkbox"/>
            <div class="Content">Item 1.1.2</div>
          </li>
        </ul>
      </li>
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <input type="checkbox"/>
        <div class="Content">Item 1.2</div>
      </li>
    </ul>
  </li>
  <li class="Node IsRoot ExpandOpen">
    <div class="Expand"></div>
    <input type="checkbox"/>
    <div class="Content">Item 2<br/>title long yeah</div>
    <ul class="Container">
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <input type="checkbox"/>
        <div class="Content">Item 2.1</div>
      </li>
    </ul>
  </li>
  <li class="Node ExpandOpen IsRoot IsLast">
    <div class="Expand"></div>
    <input type="checkbox"/>
    <div class="Content">Item 3</div>
    <ul class="Container">
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <input type="checkbox"/>
        <div class="Content">Item 3.1</div>
      </li>
    </ul>
  </li>
</ul>
</div>


<div onclick="tree_toggle(arguments[0])" id="tree">
  <div>Дерево</div>
  <ul class="Container">
<?php foreach ($organizations as $organization) { ?>
    <li class="Node IsRoot ExpandOpen IsLast">
      <div class="Expand"></div>
      <input type="checkbox"/>
      <div class="Content">
          <a href="?r=branch/show&id=<?php echo $organization->id_organization; ?>">
                              <?php echo $organization->name; ?></a>
      </div>
    <li> 
<?php } ?>
  </ul>
<div>

</section> <!-- end of left_col -->
  
<section id="right_col">
  <table border="1">
    <tr>
      <th>id_device</th>
      <th>id_organization</th>
      <th>id_branch</th>
      <th>id_department</th>
      <th>id_cabinet</th>
      <th>id_employee</th>
      <th>id_type</th>
      <th>name</th>
      <th>description</th>
      <th>inv_number</th>
      <th>sn</th>
      <th>year</th>
      <th>end_varantly_yesr</th>
      <th>service</th>
      <th>expluatation</th>
      <th>expluatation_data</th>
      <th>private</th>
      <th>break</th>
      <th>pc.id</th>
      <th>pc.id_device_pc</th>
      <th>pc.cpu_name</th>
      <th>pc.cpu_p</th>
      <th>pc.hdd_name</th>
      <th>pc.hdd_p</th>
      <th>pc.ram_name</th>
      <th>pc.ram_p</th>
      <th>pc.video_name</th>
      <th>pc.video_p</th>
      <th>pc.cdrom_name</th>
      <th>pc.lan_name</th>
      <th>pc.os</th>
      <th>pc.net_name</th>
      <th>pc.ip</th>
    </tr>
<?php foreach($devices as $device) { ?>    
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
<?php } ?>    
  </table>
</section> <!-- end of right_col -->
<div style="clear:both;"></div>

<?php var_dump($devices); ?>

<?php 

?>