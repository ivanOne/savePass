<?php

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Информация о пользователе - <strong><?php echo $model->name; ?></strong></h1>
<?php echo "<h3>Привет - ".Yii::app()->getModule('superuser')->login."</h3>";?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'login',
		'password',
	),
)); ?>
