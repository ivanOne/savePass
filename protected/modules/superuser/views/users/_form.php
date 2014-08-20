<?php

?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class='col-md-6 '>
	<p class="textcentr">Поля с символом <span class="text-danger">*</span> are required.</p>
	<div class='form-group'>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class='form-group'>
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class='form-group'>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->