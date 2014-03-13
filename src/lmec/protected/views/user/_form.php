<div class="form">
   
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'user'),
)); 
?>

<?php
if ( ! $model->isNewRecord ) {
?>
	<script>
		$( document ).ready( function(){
			$('#password2').hide();
			$('#confirm_password').hide();
		});
	</script>
<?php
	}
?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>
	
	<div class="row" id="password2" >
		<?php echo $form->labelEx($model,'_password2'); ?>
		<?php echo $form->passwordField($model,'_password2',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'_password2'); ?>
	</div>

	<div class="row" id="confirm_password" >
		<?php echo $form->labelEx($model,'_confirm_password'); ?>
		<?php echo $form->passwordField($model,'_confirm_password',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'_confirm_password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

        <div class="row">

		<?php echo $form->labelEx($model,'_selected_roles'); ?>		
		<?php  echo CHtml::activeCheckBoxList(
			$model,
			'_selected_roles',
			CHtml::listData( $model->getActiveRoles(),
								'id',
                                'name'
                           ),
			array(
				'style'=>'float: left; 
						  margin-right: 5px; 
						  margin-top: 0px;'
				)
			); ?>
		<?php echo $form->error($model,'_selected_roles')?>
	</div>

	<div class="row" >
		<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
    	<?php echo $form->checkbox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->