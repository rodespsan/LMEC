<?php

class SparePartsController extends Controller
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','assign','check','finish', 'create','update', 'admin','delete', 'activate','add','remove'),
				'roles'=>array('administrador', 'recepcionista'),
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
	public function actionCreate()
	{
		$model=new SpareParts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SpareParts']))
		{
			$model->attributes=$_POST['SpareParts'];
			if($model->save()){
				if(!empty($_POST['yt1']))
                {
                    Yii::app()->user->setFlash('spareparts-created', "¡La refacción <b><i>&quot;$model->name&quot;</i></b> fue creada exitosamente!");
                    $attributes = $model->getAttributes(array(
                    	'spare_parts_status_id',
                    	'spare_parts_type_id',
                    	'brand_id',
                    	'provider_id',
                    	'name',
                    	'price',
                    	'date_hour',
                    	'guarantee_period',
                    	'invoice',
                    	'description',
                    	'assigned',
                    	'active',
                    ));
                    $model = new SpareParts();
                    $model->attributes = $attributes;
				}
				else{
					$this->redirect(array('view','id'=>$model->id));
				}
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SpareParts']))
		{
			$model->attributes=$_POST['SpareParts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $model->active = 0;
            $model->save();


            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request againg.');
    }

	public function actionActivate($id){
            $model = $this->loadModel($id);
            $model->active = 1;
            $model->save();
            
            
	 		
            // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SpareParts', array(
                    'criteria' => array('condition' => 'active=1')
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SpareParts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SpareParts']))
			$model->attributes=$_GET['SpareParts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	 
	public function actionAssign($id)
	{
		$modelOrder = Order::model()->findByPk($id);
		
		$model=new SpareParts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SpareParts']))
			$model->attributes=$_GET['SpareParts'];

		$this->render('assign',array(
			'model'=>$model,
			'modelOrder' => $modelOrder,
		));
	}
	
	/**
	 * Assign spareParts to an order creating a new model SparePartsOrder.
	 * If creation is successful, the browser will be redirected to the same page.
	 */
	
	public function actionAdd($spare_parts_id, $order_id){
        $modelSparePartOrder = new SparePartsOrder;
 		$modelSparePartOrder->order_id = $order_id;
 		$modelSparePartOrder->spare_parts_id = $spare_parts_id;
 		var_dump($modelSparePartOrder);
 		if($modelSparePartOrder->save())
 		{
 			$model = $this->loadModel($spare_parts_id);
            $model->assigned = 1;
            if(!$model->save())
            	var_dump($model->errors);
 		}
 		else
 			var_dump($modelSparePartOrder->errors);


            // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('assign','id'=>$order_id));
    }
	
	/**
	 * Check the spareParts assigned to an order.
	 */
	public function actionCheck($id)
	{
		$modelOrder = Order::model()->findByPk($id);
		
		$model=new SpareParts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SpareParts']))
			$model->attributes=$_GET['SpareParts'];

		$this->render('check',array(
			'model'=>$model,
			'modelOrder' => $modelOrder,
		));
	}
	
	/**
	 * Remove spareParts from an order and delete the model SparePartsOrder associated
	 * with the spare_parts_id.
	 * If removing is successful, the browser will be redirected to the same page.
	 */
	
	public function actionRemove($spare_parts_id, $order_id){
		$modelSparePartsOrder = SparePartsOrder::model()->findByPk($spare_parts_id);
        $modelSparePartsOrder->delete();
		$model = $this->loadModel($spare_parts_id);
        $model->assigned = 0;
        $model->save();

        // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('check','id'=>$order_id));
    }
	
	/**
	 * Changes the order status (need spareparts) to the next one (waiting for repairs).
	 */
	
	public function actionFinish($id){
		$modelOrder = Order::model()->findByPk($id);
		$modelOrder->scenario = 'ajaxupdate';
        $modelOrder->status_order_id = 8;
		$modelOrder->save();
		$log = new BlogOrder();
        $log->order_id = $modelOrder->id;
        $log->activity = "Finalizó la asignación de refacciones a la orden con ID: " . $modelOrder->id;
        //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
        $log->user_technical_id = Yii::app()->user->id;
        $log->date_hour = date('Y-m-d H:i:s');
        $log->save();
		

        // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('order/view','id'=>$id));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SpareParts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SpareParts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SpareParts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='spare-parts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
