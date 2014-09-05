<?php
/* @var $this QuotationOrderController */
/* @var $model QuotationOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quotation-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo Order::model()->getFolio_($_GET['id']);   //$form->textField($model,'order_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php //echo $form->error($model,'order_id'); ?>
	</div>
        <br>
	<div class="row">
		<?php echo $form->labelEx($model,'quotation_text'); ?>
		<?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model'=>$model,
//                'readOnly'=>true,   
                'attribute'=>'quotation_text',
                )); ?>
		<?php echo $form->error($model,'quotation_text'); ?>
	</div>
        
      

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->