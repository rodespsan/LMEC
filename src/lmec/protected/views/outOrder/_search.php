<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_hour'); ?>
		<?php echo $form->textField($model,'date_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_hour_print'); ?>
		<?php echo $form->textField($model,'date_hour_print'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_receive_equipment'); ?>
		<?php echo $form->textField($model,'name_receive_equipment',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->