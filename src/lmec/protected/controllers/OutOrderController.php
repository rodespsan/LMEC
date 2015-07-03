<?php

class OutOrderController extends Controller
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
				'actions'=>array('index','view', 'create','update','print','onChange', 'admin','delete','activate'),
				'roles'=>array('administrador', 'recepcionista'),
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
	
	public function actionPrint($id)
	{
		$this->layout='//layouts/print'; 
	
		$this->render('print',array(
			'model'=>$this->loadModel($id),
		));		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
	
		$model=new OutOrder;
		$modelOb = new ObservationOrder;
		$order = Order::model()->findByPk($id);
		if($order === null)
			throw new CHttpException(404,'La Orden solicitada no existe.');
		$model->order = $order;
		$model->order_id = $order->id;
		$modelOb->order_id = $order->id;
		
		if(isset($_POST['OutOrder']))
		{
			
			$model->attributes=$_POST['OutOrder'];
			$modelOb->attributes=$_POST['ObservationOrder'];
			
			//$model->date_hour = $model->_date." ".$model->_hour;
			//$model->date_hour_print = date('Y-m-d H:i:s');
			//$model->total_price = $model->_service_price;

			if($model->save() && $modelOb->save()){
				
				$log = new BlogOrder();
                $log->order_id = $model->order->id;
                $log->activity = "Se creó la órden de salida para la órden con ID: " . $model->order->id;
                $log->detailed_activity = $this->renderPartial('view',array( 'model' => $model ), true);
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();
				
				$this->redirect(array('view','id'=>$model->id));
				
			}
		}
		
		$this->render('create',array('model'=>$model, 'modelOb'=>$modelOb));
		
		/*
		
		$model=new OutOrder;
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		if(isset($_POST['OutOrder']))
		{
			$model->attributes=$_POST['OutOrder'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
		*/
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = new OutOrder;
		
		$modelOb = new ObservationOrder;
		//$modelOb = ObservationOrder::model()->findByPK($id);
		$model=$this->loadModel($id);
		$modelOb = ObservationOrder::model()->find('order_id='.$model->order_id);
		//$model->separate($model->date_hour);
		//echo var_dump($imprimir);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OutOrder']))
		{
			$model->attributes=$_POST['OutOrder'];
			$modelOb->attributes=$_POST['ObservationOrder'];
			
			//$model->date_hour = $model->_date." ".$model->_hour;
			//$model->date_hour_print = date('Y-m-d H:i:s');
			
			if($model->save() && $modelOb->save()){
				$log = new BlogOrder();
                $log->order_id = $model->order->id;
                $log->activity = "Se modificó la órden en la salida con ID: " . $model->order->id;
                $log->detailed_activity = $this->renderPartial('view',array( 'model' => $model ), true);
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,'modelOb'=>$modelOb
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		/*$observation = ObservationOrder::model()->find('order_id='.$model->order_id);
		$observation->delete();
		$this->loadModel($id)->delete();*/
        $model->active = 0;
        $model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionActivate($id) {
        $model = $this->loadModel($id);
        $model->active = 1;
        $model->save();
		

        // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/* $criteria = new CDbCriteria(array(
				//'order'=>'status desc',
				'with' => array(
					'order',
					'order.customer'=>array('name'=>'customer'),
				),
			)); */
		$dataProvider=new CActiveDataProvider('OutOrder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OutOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OutOrder']))
			$model->attributes=$_GET['OutOrder'];
			
		if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
        }

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionOnChange()
	{
		$model = new OutOrder();
		$valueOrder = $_POST['OutOrder'];
		
		$model->total_price = $valueOrder['total_price'];
		$result = $model->total_price - $valueOrder['_advance_payment'];
		if($result >= 0)
			echo CHtml::encode($result);
		else
			echo CHtml::encode($result=0);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=OutOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='out-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
