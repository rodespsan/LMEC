<?php

class DiagnosticController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', // Acciones permitidas al administrador y al recepcionista
				'actions'=>array('index','view', 'create','update', 'admin','delete','deleteDiagnosticWork','updateAjax','createDiagnosticWork'),
				'roles'=>array('administrador', 'recepcionista'),
			),
			array('allow', // Acciones permitidas al técnico
				'actions'=>array('create', 'createDiagnosticWork', 'view'),
				'roles'=>array('tecnico'),
			),
            array('deny',
                'users'=>array('*'),
            ),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
	    $modelOrder=Order::model()->findByPk($id);   
        if($modelOrder === null)
		throw new CHttpException(404,'La Orden solicitada no existe.');
		if($modelOrder->status_order_id==2){    //si el estado de la orden esta en espera de diagnostico
		   $modelOrder->scenario = 'ajaxupdate';
		   $modelOrder->status_order_id==3;     //se cambia a estado en diagnostico
		   $modelOrder->save();
		}	
		$modelDiagnostic = Diagnostic::model()->find('order_id=:order_id',array(':order_id'=>$id));
		if( empty($modelDiagnostic))
		{
			$modelDiagnostic = new Diagnostic();
		}
		if( isset($_POST['Diagnostic']) )
		{    
			$modelDiagnostic->order_id = $id;
			$modelDiagnostic->user_id = Yii::app()->user->id;
			$modelDiagnostic->service_type_id = $modelOrder->service_type_id;
			$modelDiagnostic->date_hour = date('Y-m-d H:i:s');
			$modelDiagnostic->status_order_id = 5;
			$modelDiagnostic->save();
			$modelDiagnostic->attributes = $_POST['Diagnostic'];

			if($modelDiagnostic->save())
			{
			    if($_POST['Diagnostic']['status_order_id'] == 5)
				{   

                    $modelOrder->scenario = 'ajaxupdate';
					$modelOrder->status_order_id = 5;
					$modelOrder->save();
					$log = new BlogOrder();
	                $log->order_id = $modelOrder->id;
	                $log->activity = "Se asignó el estado 'Requiere Refacción' a la orden con ID: " . $modelOrder->id;
	                //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
	                $log->user_technical_id = Yii::app()->user->id;
	                $log->date_hour = date('Y-m-d H:i:s');
	                $log->save();
					$this->redirect(array('diagnostic/view','id'=>$modelDiagnostic->id));
				}else{
					if($_POST['Diagnostic']['status_order_id'] == 8){
                    	$modelOrder->scenario = 'ajaxupdate';
					    $modelOrder->status_order_id=8;
						$modelOrder->save();
		                $log = new BlogOrder();
		                $log->order_id = $modelOrder->id;
		                $log->activity = "Se asignó el estado 'En espera de reparación' a la orden con ID: " . $modelOrder->id;
		                //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
		                $log->user_technical_id = Yii::app()->user->id;
		                $log->date_hour = date('Y-m-d H:i:s');
		                $log->save();
						$this->redirect(array('diagnostic/view','id'=>$modelDiagnostic->id));
					}else{
						if($_POST['Diagnostic']['status_order_id'] == 13){
							$modelOrder->scenario = 'ajaxupdate';
							$modelOrder->status_order_id=13;
							$modelOrder->save();
							$log = new BlogOrder();
							$log->order_id = $modelOrder->id;
							$log->activity = "Se asignó el estado 'Liberado' a la orden con ID: " . $modelOrder->id;
							//$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
							$log->user_technical_id = Yii::app()->user->id;
							$log->date_hour = date('Y-m-d H:i:s');
							$log->save();
							$this->redirect(array('diagnostic/view','id'=>$modelDiagnostic->id));
						}
						else{
							$this->redirect(array('diagnostic/view','id'=>$modelDiagnostic->id));
						}
                    	
					}
				}
			}
		}
		$this->render('create', array(
			'model'=>$modelDiagnostic,
			'modelDiagnosticWork' => new DiagnosticWork(),
			'modelOrder'=>$modelOrder,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelOrder=Order::model()->findByPk($model->order_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Diagnostic']))
		{
			$model->observation=$_POST['Diagnostic']['observation'];
			$model->attributes=$_POST['Diagnostic'];
			if($model->save())
			{
				if($_POST['Diagnostic']['status_order_id'] == 5)
				{   

                    $modelOrder->scenario = 'ajaxupdate';
					$modelOrder->status_order_id = 5;
					$modelOrder->save();
					$log = new BlogOrder();
	                $log->order_id = $modelOrder->id;
	                $log->activity = "Se asignó el estado 'Requiere Refacción' a la orden con ID: " . $modelOrder->id;
	                //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
	                $log->user_technical_id = Yii::app()->user->id;
	                $log->date_hour = date('Y-m-d H:i:s');
	                $log->save();
					$this->redirect(array('diagnostic/view','id'=>$model->id));
				}else{
					if($_POST['Diagnostic']['status_order_id'] == 8){
                    	$modelOrder->scenario = 'ajaxupdate';
					    $modelOrder->status_order_id=8;
						$modelOrder->save();
		                $log = new BlogOrder();
		                $log->order_id = $modelOrder->id;
		                $log->activity = "Se asignó el estado 'En espera de reparación' a la orden con ID: " . $modelOrder->id;
		                //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
		                $log->user_technical_id = Yii::app()->user->id;
		                $log->date_hour = date('Y-m-d H:i:s');
		                $log->save();
						$this->redirect(array('diagnostic/view','id'=>$model->id));
					}else{
						if($_POST['Diagnostic']['status_order_id'] == 13){
							$modelOrder->scenario = 'ajaxupdate';
							$modelOrder->status_order_id=13;
							$modelOrder->save();
							$log = new BlogOrder();
							$log->order_id = $modelOrder->id;
							$log->activity = "Se asignó el estado 'Liberado' a la orden con ID: " . $modelOrder->id;
							//$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
							$log->user_technical_id = Yii::app()->user->id;
							$log->date_hour = date('Y-m-d H:i:s');
							$log->save();
							$this->redirect(array('diagnostic/view','id'=>$model->id));
						}
						else{
							$this->redirect(array('diagnostic/view','id'=>$model->id));
						}
                    	
					}
				}
		    }   
	    }

		$this->render('update',array(
			'model'=>$model,
			'modelDiagnosticWork' => new DiagnosticWork(),
			'modelOrder'=>$modelOrder,
		));
	}

	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{	
	if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			
 	    $modelDiagnostic=$this->loadModel($id);
    	$modelDiagnosticWork = DiagnosticWork::model()->deleteAll(
	   	array(
	    	   'condition'=>'diagnostic_id=:diagnostic_id',
	       	   'params'=>array(
							   ':diagnostic_id'=>$id
							  )
        	));
         
    	$modelDiagnostic->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}




    public function actionDeleteDiagnosticWork($diagnostic_id,$work_id)
    {	
	  $DiagnosticWork=DiagnosticWork::model()->findByPk(
    	 array(
    		  'diagnostic_id'=>$diagnostic_id,
              'work_id'=>$work_id
             )
	  );	 
      $DiagnosticWork->delete();
		 // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
	  $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionUpdateAjax($id,$id_diagnostic) 
    {
        $modelOrder=Order::model()->findByPk($id);

		$modelDiagnostic = Diagnostic::model()->find(
		'order_id=:order_id AND id=:id',
		array(
			':order_id'=>$id,
			':id'=>$id_diagnostic,
		));
		if( empty($modelDiagnostic) )
		{
			$modelDiagnostic = new Diagnostic();
			$modelDiagnostic->order_id = $id;
			$modelDiagnostic->user_id = Yii::app()->user->id;
			$modelDiagnostic->service_type_id = $modelOrder->service_type_id;
			$modelDiagnostic->date_hour = date('Y-m-d H:i:s');
			$modelDiagnostic->status_order_id = 5;
			$modelDiagnostic->save();
		}
		if( isset($_POST['DiagnosticWork']) )
		{
			$modelDiagnosticWork = DiagnosticWork::model()->find(
			'diagnostic_id=:diagnostic_id AND work_id=:work_id',
			array(
				':diagnostic_id' => $modelDiagnostic->id,
				':work_id' => $_POST['DiagnosticWork']['work_id']
			));
			
		    if( empty($modelDiagnosticWork) )
		    {
		      $modelDiagnosticWork = new DiagnosticWork();
			  $modelDiagnosticWork->diagnostic_id = $modelDiagnostic->id;
			  $modelDiagnosticWork->work_id = $_POST['DiagnosticWork']['work_id'];
			  $modelDiagnosticWork->save(false);
		    }
		
		}

		if( isset($_POST['Diagnostic']) )
		{
			$modelDiagnostic->attributes = $_POST['Diagnostic'];
			$modelDiagnostic->status_order_id = 5;
			$modelDiagnostic->save();
		}

    }
    public function actionCreateDiagnosticWork($id) 
    {
        $modelOrder=Order::model()->findByPk($id);
		$modelDiagnostic = Diagnostic::model()->find(
			'order_id=:order_id ',
			array(
				':order_id'=>$id
			));		
		
		if( empty($modelDiagnostic) )
		{
			$modelDiagnostic = new Diagnostic();
			$modelDiagnostic->order_id = $id;
			$modelDiagnostic->user_id = Yii::app()->user->id;
			$modelDiagnostic->service_type_id = $modelOrder->service_type_id;
			$modelDiagnostic->status_order_id = 5;
			$modelDiagnostic->date_hour = date('Y-m-d H:i:s');
			$modelDiagnostic->save();
		}
		
		
		if( isset($_POST['DiagnosticWork']) )
		{
			$modelDiagnosticWork = DiagnosticWork::model()->find(
			'diagnostic_id=:diagnostic_id AND work_id=:work_id',
			array(
				':diagnostic_id' => $modelDiagnostic->id,
				':work_id' => $_POST['DiagnosticWork']['work_id']
			));
			
		    if( empty($modelDiagnosticWork) )
		    {
		      $modelDiagnosticWork = new DiagnosticWork();
			  $modelDiagnosticWork->diagnostic_id = $modelDiagnostic->id;
			  $modelDiagnosticWork->work_id = $_POST['DiagnosticWork']['work_id'];
			  $modelDiagnosticWork->save(false);
		    }
		
		}

		if( isset($_POST['Diagnostic']) )
		{
			$modelDiagnostic->attributes = $_POST['Diagnostic'];
			$modelDiagnostic->status_order_id = 5;
			$modelDiagnostic->save();
		}
	
    }
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Diagnostic');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Diagnostic('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Diagnostic']))
			$model->attributes=$_GET['Diagnostic'];
		if(isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }	
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Diagnostic the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Diagnostic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Diagnostic $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='diagnostic-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
