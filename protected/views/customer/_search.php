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
		<?php echo $form->label($model,'customer_type_id'); ?>
		<?php echo $form->textField($model,'customer_type_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependence_id'); ?>
		<?php echo $form->textField($model,'dependence_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->