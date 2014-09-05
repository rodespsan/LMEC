<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php    date_default_timezone_set('America/Mexico_City'); ?>    
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-guarantee-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
                <?php echo Order::model()->getFolio_($_GET['id']) ?> 
		<?php echo $form->HiddenField($model, 'order_id', array('size' => 10, 'maxlength' => 10, 'value' => $_GET['id'], 'disabled' => true)); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>
 <br>
	<div class="row">
            
            
           
            
		<?php echo $form->labelEx($model,'activity_guarantee_id'); ?>
                 <?php  echo $form->dropDownList($model, 'activity_guarantee_id', Chtml::listData(
                  ActivityGuarantee::model()->findAll('active=1'), 'id', 'description'), array('prompt' => 'Seleccionar una actividad'));?>
		<?php // echo $form->textField($model,'activity_guarantee_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'activity_guarantee_id'); ?>
	</div>
 <br>
	<div class="row">
		<?php echo $form->labelEx($model,'technician_user_id'); ?>
                <?php echo $form->dropDownList($model, 'technician_user_id', CHtml::listData(User::model()->findAll(array('with'=>array('roles'), 'condition'=>'t.active=1')),'id','name')
                        ); ?>
		<?php // echo $form->textField($model,'technician_user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'technician_user_id'); ?>
	</div>
<br>
	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
            
                <?
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model'=>$model,
                    'attribute'=>'date_hour',
                    'mode'=>'datetime',
                    'options'=>array(
                        'dateFormat'=>'yy-mm-dd',
                        'timeFormat'=>'hh:mm:ss',
                        'pickerTimeFormat'=>'hh:mm:ss',
                        'showSecond'=>true,                       
                    ),
                    
                )); ?>
		<?php // echo $form->textField($model,'date_hour'); ?>
		<?php echo $form->error($model,'date_hour'); ?>
	</div>
<br>
        <div id="row">
            <?php echo $form->labelEx($model,'observation'); ?>
            <?php echo $form->textArea($model,'observation',  array('rows' => 6, 'cols' => 40)); ?>
            <?php echo $form->error($model, 'observation'); ?>
        </div>
<br>
        <div>
             <?php echo $form->labelEx($model,'active'); ?>
             <?php echo $form->checkBox($model,'active',array('value' => 1, 'uncheckValue' => 0)); ?>
             <?php echo $form->error($model, 'active'); ?> 
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->