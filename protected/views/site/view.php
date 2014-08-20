<h1>Просмотр информации о ресурсе <strong><?php echo $model->name; ?></strong></h1>
<div class="row">
    <div class="col-md-2 col-md-offset-5 but">
        <?php echo CHtml::link('<< Назад',array('site/index'),array('class'=>'btn btn-success'))?>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3 ">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'htmlOptions'=>array(
                'class'=>'table'
            ),
            'attributes'=>array(
                'name',
                'info',
                'login',
                'password',

            ),
        )); ?>
    <div class="row but">
        <div class="col-md-4">
            <?php echo CHtml::link('Редактировать',array('site/update','id'=>$model->id),array('class'=>'btn btn-info'))?>
        </div>
        <div class="col-md-3 col-md-offset-5">
            <?php echo CHtml::link('Удалить',array('site/delete','id'=>$model->id),array('class'=>'btn btn-danger','confirm'=>'Вы действительно хотите удалить эту запись?'))?>
        </div>
    </div>

    </div>
</div>