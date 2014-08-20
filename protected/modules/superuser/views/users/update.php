<?php


$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Информация', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Редактирование пользователя <?php echo $model->name; ?></h1>
<?php echo "<h3>Привет - ".Yii::app()->getModule('superuser')->login."</h3>";?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>