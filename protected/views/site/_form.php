<div class="row">
    <div class="col-md-2 col-md-offset-5 but">
        <?php echo CHtml::link('<< Назад',array('site/index'),array('class'=>'btn btn-success'))?>
    </div>
</div>
<div class="row">
<div class="col-md-8 col-md-offset-2">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
    'htmlOptions'=>array(

        'role'=>"form"),
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>false,)
)); ?>

	<p class="note">Поля с символом<span class="required">*</span> обязательны для заполнения</p>
    <div class="form-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('maxlength'=>50,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'login'); ?>
        <?php echo $form->textField($model,'login', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'login'); ?>
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>