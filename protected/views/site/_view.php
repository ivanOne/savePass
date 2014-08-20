<div class="view">
    <div class="col-md-6 col-md-offset-3">
	    <h2><?php echo CHtml::encode($data->name); ?></h2>
	    <p class="text-center"><strong><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</strong></p>
        <br />
        <div>
	        <?php echo CHtml::encode($data->info); ?>
        </div>
	    <br />
        <div class="row">
            <div class="col-md-4">
                <?php echo CHtml::link('Подробнее',array('site/view','id'=>$data->id),array('class'=>'btn btn-info btn-xs'))?>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <?php echo CHtml::link('Удалить',array('site/delete','id'=>$data->id),array('class'=>'btn btn-danger btn-xs','confirm'=>'Вы действительно хотите удалить эту запись?'))?>
            </div>
        </div>
    </div>
</div>
