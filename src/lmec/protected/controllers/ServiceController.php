<?php

class ServiceController extends Controller {

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
            array('allow',
                'actions'=>array('index','view','create','update','admin','delete','activate'),
                'roles'=>array('administrador','recepcionista'),
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Service;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Service'])) {
            $model->attributes = $_POST['Service'];

            if ($model->save()){
                if(!empty($_POST['yt1']))
                {
                    Yii::app()->user->setFlash('service-created', "¡El servicio <b><i>&quot;$model->name&quot;</i></b> fue creado exitosamente!");
                    $this->redirect(array('create'));
                }
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        if (ServiceType::model()->count('active = 1') > 0) {
            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException('', 'Primero debe ' . CHtml::link('crear un Tipo de Servicio', array('servicetype/create')) . '.');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Service'])) {
            $model->attributes = $_POST['Service'];
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
        //$this->loadModel($id)->delete();
        $this->loadModel($id)->logical_deletion();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Service',
                        array(
                            'criteria' => array('condition' => 'active = 1'),
                            'pagination' => array('pageSize' => 20),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
        }

        $model = new Service('search');
        $model->unsetAttributes();  // clear any default values	

        $model->serviceType = new ServiceType('search');
        $model->serviceType->unsetAttributes();

        if (isset($_GET['ServiceType']))
            $model->serviceType->attributes = $_GET['ServiceType'];

        if (isset($_GET['Service']))
            $model->attributes = $_GET['Service'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionActivate($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $model->active = 1;
            $model->save();

            // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Service::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'service-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}