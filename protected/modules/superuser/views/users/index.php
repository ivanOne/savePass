<?php




$this->menu=array(
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-md-12">
        <h1>Пользователи</h1>
        <?php echo "<h3>Привет - ".Yii::app()->getModule('superuser')->login."</h3>";?>
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
        )); ?>
    </div>
</div>