<?php

class BlogGuaranteeController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'index', 'view', 'create', 'update', 'delete', 'activate', 'ajaxUpdate', 'deleteBlogGuarantee', 'finish'),
                'roles' => array('administrador', 'recepcionista'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        
        $modelOrder = Order::model()->findByPk($id);
        if($modelOrder === null)
		  throw new CHttpException(404,'La Orden solicitada no existe.');
        
        $model = new BlogGuarantee;
        $model->technician_user_id = Yii::app()->user->id;
        $model->date_hour = date('Y-m-d H:i:s');
        $model->order_id = $modelOrder->id;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BlogGuarantee'])) {
            $model->order_id = $id;
            $model->finished = 0;
            $model->observation = $_POST['BlogGuarantee']['observation'];
            $model->attributes = $_POST['BlogGuarantee'];
            $logs = BlogGuarantee::model()->findByAttributes(array('order_id' => $modelOrder->id));
            if ($model->save() && $logs==NULL) {
                $log = new BlogOrder();
                $log->order_id = $model->id;
                $log->activity = "La orden entró a garantía";
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();
                $this->redirect(array('view', 'id' => $model->id));
                //$this->redirect(array('viewDiagnostic','id'=>$modelDiagnostic->id));
            }else
                var_dump($model->errors);
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $modelOrder = Order::model()->findByPk($id);
        if($modelOrder === null)
            throw new CHttpException(404,'La Orden solicitada no existe.');

        $model = new BlogGuarantee;
        $model->technician_user_id = Yii::app()->user->id;
        $model->date_hour = date('Y-m-d H:i:s');
        $model->order_id = $modelOrder->id;
        $model->finished = 0;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BlogGuarantee'])) {
            $model->observation = $_POST['BlogGuarantee']['observation'];
            $model->attributes = $_POST['BlogGuarantee'];

            $logs = BlogGuarantee::model()->findByAttributes(array('order_id' => $modelOrder->id, 'activity' => 'La orden entró a garantía'));
            if ($model->save() && $logs==NULL) {
                $log = new BlogOrder();
                $log->order_id = $model->id;
                $log->activity = "La orden entró a garantía";
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($id) {
        
        $dataProvider = new CActiveDataProvider('BlogGuarantee', array(
            'criteria' => array(
                'condition' => 'active=1 AND order_id='.$id,
                'order' => 'date_hour DESC'
            ),
            'pagination' => array('pageSize' => 20),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $this->loadOrder($id),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BlogGuarantee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BlogGuarantee'])){
            $model->attributes = $_GET['BlogGuarantee'];
            $model->order_id = ltrim($model->order_id,'0');
        }


        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }

       
        
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Finish the guarantee process.
     */
    public function actionFinish($id)
    {
        $modelOrder = Order::model()->findByPk($id);
        $modelOrder->scenario = 'ajaxupdate';
        $modelOrder->status_order_id = 2;
        $modelOrder->save();

        $log = new BlogOrder();
        $log->order_id = $modelOrder->id;
        $log->activity = "La orden salió de garantía";
        $log->user_technical_id = Yii::app()->user->id;
        $log->date_hour = date('Y-m-d H:i:s');
        $log->save();

        if(!isset($_GET['ajax']))
            $this->redirect(array('index', 'id' => $modelOrder->id));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return BlogGuarantee the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = BlogGuarantee::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadOrder($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param BlogGuarantee $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'blog-guarantee-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionActivate($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $model->active = 1;
            $model->save();

            // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAjaxUpdate($id){
        $blog = new BlogGuarantee();
        $modelOrder = Order::model()->findByPk($id);
        if(isset($_POST['BlogGuarantee'])){
            $blog->observation = $_POST['BlogGuarantee']['observation'];
            $blog->finished = 0;
            $blog->attributes = $_POST['BlogGuarantee'];
            $blog->technician_user_id = Yii::app()->user->id;
            $blog->order_id = $id;

            $logs = BlogOrder::model()->findByAttributes(array('order_id' => $id, 'activity' => 'La orden entró a garantía'));
            if ($blog->save() && $logs==NULL) {
                $log = new BlogOrder();
                $log->order_id = $id;
                $log->activity = "La orden entró a garantía";
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();
                $this->redirect(array('view', 'id' => $model->id));
            }else{
                var_dump($blog->errors);
                var_dump($logs->errors);
            }
        }
    }

    public function actionDeleteBlogGuarantee($id){
        BlogGuarantee::model()->findByPk($id)->delete();
    }

}
