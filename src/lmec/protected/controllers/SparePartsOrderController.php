<?php

class SparePartsOrderController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'sparePartsFromType', 'admin', 'delete', 'activate'),
                'roles'=>array('administrador', 'recepcionista'),
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
        $model = new SparePartsOrder;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);



        if (isset($_POST['SparePartsOrder'])) {
            
            $model->spare_parts_id = $_POST['SparePartsOrder']['spareParts'];
//            $model->attributes = $_POST['SparePartsOrder'];
         
     
            var_dump($model->attributes);
            
            if ($model->validate()) {

                
                
                if (isset($_POST['SparePartsOrder']['spareParts'])) {

                    $arraySpareParts = $_POST['SparePartsOrder']['spareParts'];

                    foreach ($arraySpareParts as $spareParts) {

                        $model = new SparePartsOrder;
                        $model->order_id = $modelOrder->id;
                        $model->spare_parts_id = $spareParts;
                        $model->save(false);
                    }
                }
                
                     $this->redirect(array('view','id'=>$model->id));
            }

        }




        $this->render('create', array(
            'model' => $model,
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
       
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SparePartsOrder'])) {
            $model->attributes = $_POST['SparePartsOrder'];
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
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SparePartsOrder');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SparePartsOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SparePartsOrder']))
            $model->attributes = $_GET['SparePartsOrder'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionSparePartsFromType() {
        if (isset($_POST['SparePartsOrder']['spare_parts_type_id'])) {
            $spareParts = spareParts::model()->findAll(
                    array(
                        'condition' => 'spare_parts_type_id = :spare_parts_type_id',
                        'params' => array(
                            ':spare_parts_type_id' => $_POST['SparePartsOrder']['spare_parts_type_id'],
                        )
                    )
            );
            $this->renderPartial(
                    'sparePartsFromType', array(
                'spareParts' => $spareParts,
                    )
            );
        }
    }

    public function actionDeleteSparePartOrder($id) {
        SparePartsOrder::model()->findByPk($id)->delete();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SparePartsOrder the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SparePartsOrder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SparePartsOrder $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'spare-parts-order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
