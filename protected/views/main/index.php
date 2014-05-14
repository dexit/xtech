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



</section> <!-- end of right_col -->
<div style="clear:both;"></div>

<?php var_dump($organizations); ?>