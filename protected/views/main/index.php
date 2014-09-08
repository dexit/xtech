<section id="left_col"><!-- left_col -->

  <div id="tree">
    <?php $this->renderPartial('_tree', array(
                        'organizations' => $organizations,));?>
  </div>
    <div id="add-device">
        <?php echo CHtml::beginForm(CController::createUrl('device/create'),'get'); ?>
        <div class="row">
            <div id="add-device-title">Додати пристрій</div>
            <?php $list = CHtml::listData(DeviceType::model()->findAll(),'id_device_type', 'name');?>
            <?php echo CHtml::dropDownList('device_type','id_type',$list); ?>
        </div>
        <div class="row submit">
            <?php echo CHtml::submitButton('Додати'); ?>
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
                 
</section> <!-- end of left_col -->
  
<section id="right_col"><!-- right_col -->

  <div id="data-grid">
    <?php $this->renderPartial('_device', array(
                      'dataProvider' => $dataProvider,
                      false,
                      true));?>
  </div>

</section> <!-- end of right_col -->

<div id="loader">
        <span>Загрузка...</span>
</div>

<div style="clear:both;"></div>