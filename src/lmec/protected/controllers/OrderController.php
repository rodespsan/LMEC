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
            array('allow', // allow all users to perform 'index', 'view' and 'search' actions
                'actions' => array('index', 'view', 'search'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'contactsFromCustomer', 'servicesFromServiceType', 'brandsFromEquipment', 'modelsFromBrand', 'advancePaymentFromPaymentType'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'brandsFromEquipment', 'modelsFromBrand', 'advancePaymentFromPaymentType', 'ajaxupdate', 'activate', 'print'),
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

        $model = $this->loadModel($id);

        $modelFailureDescription = FailureDescription::model()->find('order_id =' . $model->id);
        if ($modelFailureDescription != NULL) {

            $model->_failureDescription = $modelFailureDescription->description;
        }

        $modelEquipment_status = EquipmentStatus::model()->find('order_id =' . $model->id);


        if ($modelEquipment_status != NULL) {
            $model->_equipmentStatus = $modelEquipment_status->description;
        }


        $modelAccesoryOrder = AccesoryOrder::model()->findAll('order_id =' . $model->id);


        $this->render('view', array(
            'model' => $model,
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
            $model->observation = $_POST['Order']['observation'];
            $model->attributes = $_POST['Order'];

            if ($model->save()) {

                if (isset($_POST['Order']['accesory'])) {

                    $accessories = $_POST['Order']['accesory'];

                    foreach ($accessories as $accesory) {

                        $modelAccesoryOrder = new AccesoryOrder;
                        $modelAccesoryOrder->order_id = $model->id;
                        $modelAccesoryOrder->accesory_id = $accesory;
                        $modelAccesoryOrder->save();
                    }
                }

                $failureDescription = new FailureDescription();
                $failureDescription->order_id = $model->id;
                $failureDescription->description = $_POST['Order']['_failureDescription'];
                $failureDescription->save();

                $equipment_status = new EquipmentStatus();
                $equipment_status->order_id = $model->id;
                $equipment_status->description = $_POST['Order']['_equipmentStatus'];
                $equipment_status->save();

                $serviceOrder = new ServiceOrder();
                $serviceOrder->order_id = $model->id;
                $serviceOrder->service_id = $_POST['Order']['service'];

                $service = Service::model()->findByPk($serviceOrder->service_id);

                $serviceOrder->price = $service->price;
                $serviceOrder->date = date('Y-m-d H:i:s');
                $serviceOrder->save();

                $log = new BlogOrder();
                $log->order_id = $model->id;
                $log->activity = "Se creó una nueva orden con ID: " . $model->id;
                $log->detailed_activity = $this->renderPartial('view',array( 'model' => $model ), true);
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();

                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateAccesoryOrder() {

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

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $model->equipment_type_id = $model->modelo->equipment_type_id;
        $model->brand_id = $model->modelo->brand_id;

        $modelFailureDescription = FailureDescription::model()->find('order_id =' . $model->id);

        if (!empty($modelFailureDescription)) {
            $model->_failureDescription = $modelFailureDescription->description;
        }

        $modelEquipment_status = EquipmentStatus::model()->find('order_id =' . $model->id);

        if (!empty($modelEquipment_status)) {
            $model->_equipmentStatus = $modelEquipment_status->description;
        }

        $modelServiceOrder = ServiceOrder::model()->find('order_id=' . $model->id);

        if (!empty($modelServiceOrder)) {
            $model->service = $modelServiceOrder->service_id;
        }


        $modelAccesoryOrder = AccesoryOrder::model()->findAll('order_id =' . $model->id);

        if (!empty($modelAccesoryOrder)) {
            $model->accesory = array();
            foreach ($modelAccesoryOrder as $accesoryOrder) {
                $model->accesory[] = $accesoryOrder->accesory_id;
            }
        }





        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {

            $model->observation = $_POST['Order']['observation'];
            $model->attributes = $_POST['Order'];


            if ($model->save()) {

                if (!empty($modelAccesoryOrder)) {
                    AccesoryOrder::model()->deleteAll('order_id='.$model->id);
                }

                if (isset($_POST['Order']['accesory'])) {

                    $accessories = $_POST['Order']['accesory'];
                    foreach ($accessories as $accesory) {
                        $modelAccesoryOrder = new AccesoryOrder;
                        $modelAccesoryOrder->order_id = $model->id;
                        $modelAccesoryOrder->accesory_id = $accesory;
                        $modelAccesoryOrder->save();
                    }
                }


                if (empty($modelFailureDescription)) {
                    $modelFailureDescription = new FailureDescription();
                    $modelFailureDescription->order_id = $model->id;
                    $modelFailureDescription->description = $_POST['Order']['_failureDescription'];
                    $modelFailureDescription->save();
                } else {
                    $modelFailureDescription->description = $_POST['Order']['_failureDescription'];
                    $modelFailureDescription->save();
                }

                if (empty($modelEquipment_status)) {
                    $modelEquipment_status = new EquipmentStatus();
                    $modelFailureDescription->order_id = $model->id;
                    $modelEquipment_status->description = $_POST['Order']['_equipmentStatus'];
                    $modelEquipment_status->save();
                } else {
                    $modelEquipment_status->description = $_POST['Order']['_equipmentStatus'];
                    $modelEquipment_status->save();
                }

                if (empty($modelServiceOrder)) {
                    $modelServiceOrder = new ServiceOrder();
                    $modelServiceOrder->order_id = $model->id;
                    $modelServiceOrder->service_id = $_POST['Order']['service'];
                    $modelServiceOrder->date = date('Y-m-d H:i:s');

                    $service = Service::model()->findByPk($modelServiceOrder->service_id);
                    $modelServiceOrder->price = $service->price;
                    $modelServiceOrder->save();
                } else {
                    $modelServiceOrder->service_id = $_POST['Order']['service'];
                    $modelServiceOrder->save();
                }

                $log = new BlogOrder();
                $log->order_id = $model->id;
                $log->activity = "Se modificó la orden con ID: " . $model->id;
                $log->detailed_activity = $this->renderPartial('view',array( 'model' => $model ), true);
                $log->user_technical_id = Yii::app()->user->id;
                $log->date_hour = date('Y-m-d H:i:s');
                $log->save();

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelAccesoryOrder' => $modelAccesoryOrder,
            'modelEquipment_status' => $modelEquipment_status,
            'modelFailureDescription' => $modelFailureDescription,
            'modelServiceOrder' => $modelServiceOrder,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            $model->scenario = "ajaxupdate";
            $model->active = 0;
            $model->save();

            $log = new BlogOrder();
            $log->order_id = $model->id;
            $log->activity = "Se eliminó la orden con ID: " . $model->id;
            // $log->detailed_activity = $this->renderPartial('view',array( 'model' => $model ), true);
            $log->user_technical_id = Yii::app()->user->id;
            $log->date_hour = date('Y-m-d H:i:s');
            $log->save();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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
        if (isset($_GET['Order'])) {
            $model->attributes = $_GET['Order'];
        }

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }



        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionSearch() {
        $model = new Order('search');

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order'])) {
            $model->attributes = $_GET['Order'];
        }

        // if (isset($_POST['Order'])) {
        //     $model->attributes = $_POST['Order'];
        //     if ($model->save())
        //         $this->redirect(array('view', 'id' => $model->id));
        // }

        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }



        $this->render('search', array(
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

    public function actionServicesFromServiceType(){
        if (isset($_POST['Order']['service_type_id'])) {
            $serviceType = ServiceType::model()->findByPk($_POST['Order']['service_type_id']);


            $services = Service::model()->findAll(array(
                'condition' => 'service_type_id = :service_type_id',
                'order' => 'name',
                'params' => array(
                    ':service_type_id' => $_POST['Order']['service_type_id'],
                ),
            ));


            $this->renderPartial('servicesFromServiceType', array(
                'serviceTyper' => $serviceType,
                'services' => $services,
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

    public function actionActivate($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $model->scenario = "ajaxupdate";
            $model->active = 1;
            $model->save();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionAjaxupdate($act) {
        if ($act = 'doUpdate') {
            if ($_POST['OrderGrid']) {
                foreach ($_POST['OrderGrid'] as $orderId => $orderData) {
                    $order = Order::model()->findByPk($orderId);
                    if (!empty($order)) {
                        $order->scenario = "ajaxupdate";
                        // $order->service_type_id = $orderData['service_type_id'];
                        $order->status_order_id = $orderData['status_order_id'];
                        $order->technician_order_id = $orderData['technician_order_id'];
                        $order->save();
                    }
                }
            }
        }
    }

    public function actionPrint($id) {
        $this->layout = '//layouts/print';
        $model = $this->loadModel($id);

        $this->render('print', array(
            'model' => $model,
        ));
    }

}
