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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'activate', 'updateAjax', 'createBlogGuarantee', 'deleteBlogGuarantee'),
                'users' => array('admin'),
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
            $model->observation = $_POST['BlogGuarantee']['observation'];
            $model->attributes = $_POST['BlogGuarantee'];

            if ($model->save()) {

                if ($model->finished == 1) {
                    $modelOrder->status_order_id = 8;
                    $modelOrder->save();
                    //$this->redirect(array('viewDiagnostic','id'=>$modelDiagnostic->id));
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
//                        'modelActivityGuarantee'=>$modelActivityGuarantee
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BlogGuarantee'])) {
            $model->observation = $_POST['BlogGuarantee']['observation'];
            $model->attributes = $_POST['BlogGuarantee'];

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
            'criteria' => array('condition' => 'active=1 AND order_id='.$id),
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

    public function actionCreateBlogGuarantee($id){
        $blog = new BlogGuarantee();
        if($_POST['BlogGuarantee']){
            $blog->observation = $_POST['BlogGuarantee']['observation'];
            $blog->finished = $_POST['BlogGuarantee']['finished'];
            $blog->attributes = $_POST['BlogGuarantee'];
            $blog->technician_user_id = Yii::app()->user->id;
            $blog->order_id = $id;
            $blog->save();
        }
    }

    public function actionDeleteBlogGuarantee($id){
        BlogGuarantee::model()->findByPk($id)->delete();
    }

    public function actionUpdateAjax($id) {

        $modelRepair = Repair::model()->find('order_id=:order_id', array(
            ':order_id' => $id,
        ));

        if (empty($modelRepair)) {
            $modelRepair = new Repair();
            $modelRepair->order_id = $id;
        }

        if (isset($_POST['BlogGuarantee'])) {
            $modelRepair->attributes = $_POST['BlogGuarantee'];
            $modelRepair->save();

            if ($modelRepair->finished == 1) {
                $this->redirect(array('view', 'id' => $modelRepair->id));
            }
        }
    }

}
