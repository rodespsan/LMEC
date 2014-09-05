<?php

class OrderController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'contactsFromCustomer', 'brandsFromEquipment', 'modelsFromBrand','advancePaymentFromPaymentType'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'brandsFromEquipment', 'modelsFromBrand','advancePaymentFromPaymentType'),
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
    public function actionCreate() {
        $model = new Order;

        $model->receptionist_user_id = Yii::app()->user->id;
        $model->date_hour = date('Y-m-d H:i:s');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    //public function actionOutOrder(){
    //	$model = Order::model()->findByPk($id);
    //$model-outOrder::model();
    //$outOrder->$model->findAll();
//	}

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * 
     */
    public function actionContactsFromCustomer() {
        if (isset($_POST['Order']['customer_id'])) {
            $customer = Customer::model()->findByPk($_POST['Order']['customer_id']);


            $contacts = Contact::model()->findAll(array(
                'condition' => 'customer_id = :customer_id',
                'order' => 'name',
                'params' => array(
                    ':customer_id' => $_POST['Order']['customer_id'],
                ),
            ));

            $advance_payment = PaymentType::model()->findByPK($customer->customer_type_id);


            $this->renderPartial('contactsFromCustomer', array(
                'customer' => $customer,
                'contacts' => $contacts,
                'advance_payment' => $advance_payment,
            ));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * 
     */
    public function actionBrandsFromEquipment() {


        if (isset($_POST['Order']['equipment_type_id'])) {

            $brands = Modelo::model()->findAll(array(
                'select' => 't.brand_id, t.equipment_type_id',
                'distinct' => true,
                'condition' => 'equipment_type_id = :equipment_type_id',
                'order' => 'name',
                'params' => array(
                    ':equipment_type_id' => $_POST['Order']['equipment_type_id'],
                ),
            ));

            $models = Modelo::model()->findAll(array(
                'condition' => 'equipment_type_id = :equipment_type_id',
                'order' => 'name',
                'params' => array(
                    ':equipment_type_id' => $_POST['Order']['equipment_type_id'],
                ),
            ));

            $this->renderPartial('brandsFromEquipment', array(
                'models' => $models,
                'brands' => $brands,
            ));
        }
    }

    public function actionModelsFromBrand() {

        if (isset($_POST['Order']['brand_id'])) {


            $models = Modelo::model()->findAll(array(
                'condition' => 'brand_id = :brand_id AND equipment_type_id=:equipment_type_id ',
                'order' => 'name',
                'params' => array(
                    ':brand_id' => $_POST['Order']['brand_id'],
                    ':equipment_type_id' => $_POST['Order']['equipment_type_id'],
                ),
            ));

            $this->renderPartial('modelsFromBrand', array(
                'models' => $models,
            ));
        }
    }

    public function actionAdvancePaymentFromPaymentType() {
          
        if (isset($_POST['Order']['payment_type_id'])) {

             $advance_payment = PaymentType::model()->findByPK($_POST['Order']['payment_type_id']);

            $this->renderPartial('advancePaymentFromPaymentType', array(
                'advance_payment' => $advance_payment,
            ));
        }
    }

}
