<?php

class RepairController extends Controller {

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
                'actions'=>array('index','view','create','update','admin','delete','createRepairWork','deleteRepairWork','updateAjax'),
                'roles'=>array('administrador','tecnico'),
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
    public function actionCreate($id) {
        $modelOrder = Order::model()->findByPk($id);
        if ($modelOrder === null)
            throw new CHttpException(404, 'La Orden solicitada no existe.');
        $modelOrder = Order::model()->findByPk($id);
        $modelRepair = Repair::model()->find('order_id=:order_id ', array(':order_id' => $id));
        if ($modelOrder->status_order_id == 8) {
            $modelOrder->scenario = 'ajaxupdate';
            $modelOrder->status_order_id = 9;
            $modelOrder->save();
        }
        if (empty($modelRepair)) {
            $modelRepair = new Repair();
        }
        if (isset($_POST['Repair'])) {
            $modelRepair->order_id = $id;
            $modelRepair->description = $_POST['Repair']['description'];
            $modelRepair->attributes = $_POST['Repair'];
            if ($modelRepair->save()) {
                if ($modelRepair->finished == 1) {
                    $modelOrder->scenario = 'ajaxupdate';
                    $modelOrder->status_order_id = 11;
                    $modelOrder->save();
                    $log = new BlogOrder();
                    $log->order_id = $modelOrder->id;
                    $log->activity = "Se asignó el estado 'en espera de verificación' a la orden con ID: " . $modelOrder->id;
                    //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
                    $log->user_technical_id = Yii::app()->user->id;
                    $log->date_hour = date('Y-m-d H:i:s');
                    $log->save();
                    $this->redirect(array('repair/view', 'id' => $modelRepair->id));
                } else {
                    $modelOrder->scenario = 'ajaxupdate';
                    $modelOrder->status_order_id = 9;
                    $modelOrder->save();
                    $log = new BlogOrder();
                    $log->order_id = $modelOrder->id;
                    $log->activity = "Se asignó el estado 'en Reparación' a la orden con ID: " . $modelOrder->id;
                    //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
                    $log->user_technical_id = Yii::app()->user->id;
                    $log->date_hour = date('Y-m-d H:i:s');
                    $log->save();
                    Yii::app()->user->setFlash('success', "¡Se ha guardado correctamente !");
                }
            }
        }
        $this->render('create', array(
            'model' => $modelRepair,
            'modelRepairWork' => new RepairWork(),
            'modelOrder' => $modelOrder,
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelOrder=Order::model()->findByPk($model->order_id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Repair'])) {
            $model->description = $_POST['Repair']['description'];
            $model->attributes = $_POST['Repair'];
            if ($model->save()) {
                if ($model->finished == 1) {
                    $modelOrder->scenario = 'ajaxupdate';
                    $modelOrder->status_order_id = 11;
                    $modelOrder->save();
                    $log = new BlogOrder();
                    $log->order_id = $modelOrder->id;
                    $log->activity = "Se asignó el estado 'en espera de verificación' a la orden con ID: " . $modelOrder->id;
                    //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
                    $log->user_technical_id = Yii::app()->user->id;
                    $log->date_hour = date('Y-m-d H:i:s');
                    $log->save();
                    $this->redirect(array('view', 'id' => $model->id));
                } else {
                    $modelOrder->scenario = 'ajaxupdate';
                    $modelOrder->status_order_id = 9;
                    $modelOrder->save();
                    $log = new BlogOrder();
                    $log->order_id = $modelOrder->id;
                    $log->activity = "Se asignó el estado 'en Reparación' a la orden con ID: " . $modelOrder->id;
                    //$log->detailed_activity = "$this->renderPartial('view',array( 'model' => $modelOrder ), true)";
                    $log->user_technical_id = Yii::app()->user->id;
                    $log->date_hour = date('Y-m-d H:i:s');
                    $log->save();
                    Yii::app()->user->setFlash('success', "¡Se ha actualizado correctamente !");
                }
            }
        }
        $this->render('update', array(
            'model' => $model,
            'modelRepairWork' => new RepairWork(),
            'modelOrder'=>$modelOrder,
        ));
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Repair');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Repair('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Repair'])) {
            $model->attributes = $_GET['Repair'];
            $model->order_id = ltrim($model->order_id, '0');
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
     * @return Repair the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Repair::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param Repair $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'repair-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionDeleteRepairWork($id) {
        RepairWork::model()->findByPk($id)->delete();
    }
    public function actionCreateRepairWork($id) {
        $modelRepair = Repair::model()->find('order_id=:order_id', array(':order_id' => $id));
        if (empty($modelRepair)) {
            $modelRepair = new Repair();
            $modelRepair->order_id = $id;
            $modelRepair->description = $_POST['Repair']['description'];
            $modelRepair->finished = $_POST['Repair']['finished'];
            $modelRepair->save();
        }
        if (isset($_POST['RepairWork'])) {
            $modelRepairWork = RepairWork::model()->find('repair_id=:repair_id AND work_id=:work_id', array(
                ':repair_id' => $modelRepair->id,
                ':work_id' => $_POST['RepairWork']['work_id']
            ));
            if (empty($modelRepairWork)) {
                $modelRepairWork = new RepairWork();
                $modelRepairWork->repair_id = $modelRepair->id;
                $modelRepairWork->user_id = Yii::app()->user->id;
                $modelRepairWork->date_hour = date('Y-m-d H:i:s');
                $modelRepairWork->work_id = $_POST['RepairWork']['work_id'];
                $modelRepairWork->validate();
                $modelRepairWork->save(false);
            }
        }
    }
    public function actionUpdateAjax($id) {
        $modelRepair = Repair::model()->find('order_id=:order_id', array(
            ':order_id' => $id,
        ));
        if (empty($modelRepair)) {
            $modelRepair = new Repair();
            $modelRepair->order_id = $id;
        }
        if (isset($_POST['RepairWork'])) {
            $modelRepairWork = RepairWork::model()->find('repair_id=:repair_id AND work_id=:work_id', array(
                ':repair_id' => $modelRepair->id,
                ':work_id' => $_POST['RepairWork']['work_id']
            ));
            if (empty($modelRepairWork)) {
                $modelRepairWork = new RepairWork();
                $modelRepairWork->repair_id = $modelRepair->id;
                $modelRepairWork->user_id = Yii::app()->user->id;
                $modelRepairWork->date_hour = date('Y-m-d H:i:s');
                $modelRepairWork->work_id = $_POST['RepairWork']['work_id'];
                $modelRepairWork->validate();
                $modelRepairWork->save(false);
            }
        }
        if (isset($_POST['Repair'])) {
            $modelRepair->attributes = $_POST['Repair'];
            $modelRepair->save();
            if ($modelRepair->finished == 1) {
                $this->redirect(array('view', 'id' => $modelRepair->id));
            }
        }
    }
}