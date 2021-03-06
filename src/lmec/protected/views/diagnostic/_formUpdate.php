<?php
/* @var $this DiagnosticController */
/* @var $model Diagnostic */
/* @var $form CActiveForm */
?>

<div class="form">


 <?php 
     $form=$this->beginWidget('CActiveForm', array(
	  'id'=>'diagnostic-form',
	  'enableAjaxValidation'=>false,
      'htmlOptions'=>array(
            //'onsubmit'=>"return false;", 
       ),
 )); 
 ?>

  <script type="text/javascript">
    function send(){
        var data=$("#diagnostic-form").serialize();
      	$.ajax({
    	    type: 'POST',
    	    url: '<?php  echo Yii::app()->createAbsoluteUrl("diagnostic/createDiagnosticWork", array("id" => $_GET['id']));?>',
            data:data,
            success: function(){
            },
            complete: function(){   
			   $.fn.yiiGridView.update("diagnostic-work-grid");
            },
            error: function() { // if error occured
			},
            dataType:'html'
        });
    }
</script>

   
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'observation'); ?>
		<?php echo $form->textArea($model,'observation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observation'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($modelDiagnosticWork,'work_id');?>
		<?php echo $form->dropDownList(
			$modelDiagnosticWork,
			'work_id',
			Chtml::listData(
				Work::model()->findAll(
					array(
						'condition' => 'active=1 AND service_type_id='.$modelOrder->service_type_id,
						'order' => 'name'
					)
				),
				'id',
				'name'
			),
			array(
				'prompt'=>'Seleccionar'
			)
		);?>
		<?php echo CHtml::Button('Agregar +',array('id'=>'agregar','name'=>'agregar','onclick'=>'send();')); ?>
		<?php echo $form->error($modelDiagnosticWork,'work_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'status_order_id');?>
		<?php 
		$statusArray = array(5,8,13);
		echo $form->dropDownList(
			$model,
			'status_order_id',
			Chtml::listData(
				StatusOrder::model()->findAllByAttributes(array("id"=>$statusArray)),
				'id',
				'status'
			),
			array(
				'prompt'=>'Seleccionar'
			)
		);?>
		<?php echo $form->error($model,'status_order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar',array('id'=>'guardar','name'=>'guardar',/*'onclick'=>'sendUpdate();'*/)); ?> 			
	</div>
	
<?php $this->endWidget(); ?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'diagnostic-work-grid',
	'dataProvider' => new CActiveDataProvider('DiagnosticWork', array(
			'criteria'=>array(
				'condition' => 'diagnostic_id=:diagnostic_id',
				'params' => array(
					':diagnostic_id' => $model->id,
				),
			),
	)),
	'columns' => array
	(
		'work.id',
		'work.name',
         
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
            //'template' => '{view}{update}{delete}',
            'template' => '{delete}',
            'buttons'=>array(
            	'delete' => array(
            		'url' => 'Yii::app()->createUrl("/diagnostic/deleteDiagnosticWork",array("diagnostic_id" => $data->diagnostic_id, "work_id" => $data->work_id))',  //phpExpresion
            	),
            ),
        ),
        
    ),
)); ?>

</div><!-- form -->