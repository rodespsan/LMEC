

<?php
/* @var $this RepairController */
/* @var $model Repair */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'repair-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        //Para el envio por ajax
        'htmlOptions' => array(
//            'onsubmit' => "return false;", /* Disable normal form submit */
//                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
        ),
    ));
    ?>



    <script type="text/javascript">

        function send()
        {

            var data = $("#repair-form").serialize();


            $.ajax({
                type: 'POST',
                url: '<?php echo  Yii::app()->createAbsoluteUrl("repair/createRepairWork", array("id" => $_GET['id']));
        ?>',
                data: data,
                success: function() {

                },
                complete: function() {

                    $.fn.yiiGridView.update("repair-work-grid");

                },
                error: function() { // if error occured
            
                  

                },
                dataType: 'html'
            });

        }

        function sendUpdate()
        {

            var data = $("#repair-form").serialize();


            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("repair/updateAjax", array("id" => $_GET['id']));
                        ?>',
                data: data,
                success: function() {
                    
                   <?php //$this->redirect(array('view', 'id' => $model->id));?>
                    
                },
                error: function() { // if error occured
            
                    alert("No se ha guardado correctamente. Vuelva a intentar");
   
                },
                dataType: 'html'
            });

        }


    </script>



    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">


        <?php echo $form->labelEx($model, 'order_id'); ?>
        <?php echo Order::model()->getFolio_($_GET['id']) ?>        
        <?php // echo $form->HiddenField($model, 'order_id', array('size' => 10, 'maxlength' => 10, 'value' => Order::model()->getFolio_($_GET['id']), 'disabled' => true));
        ?>
        <?php echo $form->error($model, 'order_id'); ?>
    </div>

    <br>
    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <br>


    <div class="row">

        <?php echo $form->labelEx($modelRepairWork, 'work_id'); ?>
        <?php
        echo $form->dropDownList(
                $modelRepairWork, 'work_id', Chtml::listData(
                        Work::model()->findAll(
                            array(
                                'condition' => 'active = 1 AND service_type_id=2',
                                'order' => 'name'
                            )
                        ), 'id', 'name'
                ), array(
            'prompt' => 'Seleccionar un trabajo'
                )
        );
        ?>
        <?php echo CHtml::Button('Agregar +', array('id' => 'agregar', 'name' => 'agregar', 'onclick' => 'send();')); ?>
        <?php echo $form->error($modelRepairWork, 'work_id'); ?>
    </div>




    <div class="row">
        <?php echo $form->labelEx($model, 'finished'); ?>
        <?php echo $form->checkBox($model, 'finished', array('value' => 1, 'uncheckValue' => 0)); ?>
        <?php echo $form->error($model, 'finished'); ?>
    </div>
   
    
    <br>
    <div class="row">
        
        
        
       
        <?php echo CHtml::submitButton('Guardar', array('id' => 'guardar', 'name' => 'guardar', /*'onclick' => 'sendUpdate();'*/)); ?>

    </div>

 <?php $this->endWidget(); ?>


    

    <div class="row">
        
        <div style="text-align:center; margin: 15px 0 -30px 0"><h5>Trabajos realizados</h5></div>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            
            'id' => 'repair-work-grid',
            'dataProvider' => new CActiveDataProvider('RepairWork', array(
                'criteria' => array(
                    'condition' => 'repair_id=:repair_id',
                    'params' => array(
                        ':repair_id' => $model->id,
                    ),
                ),
                    )),
            'columns' => array(
                'work.id',
                'work.name',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("/repair/deleteRepairWork",array("id"=>$data->id,"repair_id"=>$data->repair_id,"work_id"=>$data->work_id))',
                        )
                    ),
                ),
            ),
        ));
        ?>

    </div>





</div><!-- form -->