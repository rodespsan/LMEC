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

<script type="text/javascript">
function send()
{
	var data = $("#blog-guarantee-form").serialize();
	$.ajax({
		type: 'POST',
		url: '<?php echo  Yii::app()->createAbsoluteUrl("blogGuarantee/ajaxUpdate", array("id" => $_GET['id']));?>',
		data: data,

		success: function() {
		},

		complete: function() {
			$.fn.yiiGridView.update("activity-guarantee-grid");
		},

        error: function() { // if error occured
        },

        dataType: 'html'
    });

}
</script>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
        <?php echo Order::model()->getFolio_($_GET['id']) ?> 
		<?php //echo $form->HiddenField($model, 'order_id', array('size' => 10, 'maxlength' => 10, 'value' => $_GET['id'], 'disabled' => true)); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>
 <br>
	<div class="row">
		<?php echo $form->labelEx($model,'activity_guarantee_id'); ?>
        <?php  echo $form->dropDownList($model, 'activity_guarantee_id', Chtml::listData(
        	ActivityGuarantee::model()->findAll('active=1'), 'id', 'description'), array('prompt' => 'Seleccionar'));?>
		<?php // echo $form->textField($model,'activity_guarantee_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'activity_guarantee_id'); ?>
		<?php echo CHtml::Button('Agregar +', array('id' => 'agregar', 'name' => 'agregar', 'onclick' => 'send();')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php $this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'date_hour',
			'options'=>array(
				'dateFormat'=>'yy-mm-dd',
				'timeFormat'=>'hh:mm:ss',
				'pickerTimeFormat'=>'hh:mm:ss',
				'showSecond'=>true,
			)
		)); ?>
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
<br>
    <div class="row">
        <?php echo $form->labelEx($model, 'finished'); ?>
        <?php echo $form->checkBox($model, 'finished', array('value' => 1, 'uncheckValue' => 0)); ?>
        <?php echo $form->error($model, 'finished'); ?>
    </div>
<br>
    <div class="row">
        <?php echo CHtml::submitButton('Guardar', array('id' => 'guardar', 'name' => 'guardar')); ?>
    </div>

<?php $this->endWidget(); ?>

<div class="row">

	<div style="text-align:center; margin: 15px 0 -30px 0"><h5>Actividades realizadas</h5></div>

	<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'activity-guarantee-grid',
		'dataProvider' => new CActiveDataProvider('BlogGuarantee', array(
			'criteria' => array(
				'condition' => 'order_id=:order_id',
				'params' => array(
					':order_id' => $model->order_id,
					),
				),
			)),
		'columns' => array(
			'id',
			//'order_id',
			array(
				'name'=>'order_id',
				'value' => '$data->order->Folio',
            ),
			array(
				'name' => 'activity_guarantee_id',
				'value' => '$data->activityGuarantee->description',
			),
			array(
				'name' => 'technician_user_id',
				'value' => '$data->technicianUser->name." ".$data->technicianUser->last_name',
			),
			'date_hour',
			'observation',
			array(
				'class' => 'CButtonColumn',
				'template' => '{delete}',
				'buttons' => array(
					'delete' => array(
						'url' => 'Yii::app()->createUrl("/blogGuarantee/deleteBlogGuarantee",array("id"=>$data->id))',
						)
					),
				),
			),
		));
		?>
	</div>

</div><!-- form -->