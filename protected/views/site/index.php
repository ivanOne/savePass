<h1>Привет <strong><?php echo Yii::app()->user->name;?></strong></h1>
<div class="row">
<div class="col-md-6 col-md-offset-3">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'emptyText'=>'Записей нет',
    'summaryText'=>false,
    'pager'=>array(
        'lastPageLabel'=>'>>',
        'nextPageLabel'=>'>',
        'prevPageLabel'=>'<',
        'firstPageLabel'=>'<<',
        'selectedPageCssClass'=>'active',
        'header'=>false,
        'cssFile'=>false,
        'internalPageCssClass'=>'',
        'htmlOptions'=>array('class'=>'pagination')

    )
)); ?>
</div>
</div>
<div class="row new">
    <div class="col-md-2 col-md-offset-5">
        <?php echo CHtml::link('Новая запись',array('site/create'),array('class'=>'btn btn-success'))?>
</div>
    </div>