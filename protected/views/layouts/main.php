<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css"  />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"  />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">

	<div id="header">
        <div class="row">
		    <div class="col-md-4 col-md-offset-4"><h1 class="slogan"><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
        </div>
	</div>
    <?php if(!Yii::app()->user->isGuest):?>
        <div class="row">
            <div class="col-md-2 col-md-offset-5"><h1 class="slogan"><?php echo CHtml::link('Выход',array('logout'),array('class'=>'btn btn-warning btn-xs','id'=>'exit')); ?></h1></div>
        </div>
    <?php endif; ?>
    <?php if(Yii::app()->user->name===Yii::app()->getModule('superuser')->login):?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4"><h1 class="slogan"><?php echo CHtml::link('Перейти в зону пользователей',array('logout'),array('class'=>'btn btn-danger btn-xs','id'=>'exit')); ?></h1></div>
        </div>
    <?php endif; ?>
	<?php echo $content; ?>

	<div class="clear"></div>
	<div id="footer">
        <div class="col-md-4 col-md-offset-4">
            Copyright &copy; <?php echo date('Y'); ?> by Ivan Kazionov.<br/>
        </div>
	</div>

</div>

</body>
</html>
