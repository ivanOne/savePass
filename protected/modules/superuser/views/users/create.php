<?php



$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Создание пользователя</h1>
<?php echo "<h3>Привет - ".Yii::app()->getModule('superuser')->login."</h3>";?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>