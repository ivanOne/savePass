<?php

$this->pageTitle=Yii::app()->name . ' - Login';

?>
<div class="form">
    <div class='col-md-4 col-md-offset-4'>
        <div class="row">
            <div class="col-md-12">
                <h2>Авторизация SuperUser</h2>
            </div>
            <div class="col-md-12">
                <p class="textcentr">Для дальнейшей работы требуется авторизация:</p>
            </div>
            <div class="col-md-12">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'login-admin',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                    )); ?>

                    <p class="textcentr">Поля с символом <span class="text-danger">*</span> обязательны для заполнения.</p>

                    <div class="inputZone">
                        <?php echo $form->labelEx($model,'username'); ?>
                        <?php echo $form->textField($model,'username'); ?>
                        <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
                    </div>

                    <div class="inputZone">
                        <?php echo $form->labelEx($model,'password'); ?>
                        <?php echo $form->passwordField($model,'password'); ?>
                        <?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
                    </div>

                    <div class="inputZone">
                        <?php echo CHtml::submitButton('Войти',array('class'=>"btn btn-primary")); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>





    </div>
</div>