<?php

class ContactController extends Controller {

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
                'actions' => array('create', 'update', 'activate'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        if (Customer::model()->count('active=1') == 0) {
            throw new CHttpException('', 'Primero debe ' . CHtml::link('crear un Cliente', array('customer/create')) . '.');
        }

        $model = new Contact('scenarioCreate');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $transaction = Yii::app()->db->beginTransaction();
        try {
            if (isset($_POST['Contact'])) {

                $model->attributes = $_POST['Contact'];

                if ($model->save()) {

                    $model_customer_contact = new CustomerContact();


                    $model_customer_contact->customer_id = $_POST['Contact']['customer_id'];
                    $model_customer_contact->contact_id = $model->id;
                    var_dump($model_customer_contact);
                    if ($model_customer_contact->save()) {
                        $transaction->commit();
                        $this->redirect(array('view', 'id' => $model->id));
                    }

                    $transaction->rollBack();
                }
            }
        } catch (Exception $e) {
            $transaction->rollBack();
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
        $model->old_customer_id = $model->customer_id = $model->customers[0]->id;

        $model->scenario = 'scenarioUpdate';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $transaction = Yii::app()->db->beginTransaction();
        try {
            if (isset($_POST['Contact'])) {

                $model->attributes = $_POST['Contact'];
                //$model->active = 1;
                if ($model->save()) {

                    if ($model->customer_id != $model->old_customer_id) {
                        $sql = "UPDATE tbl_customer_contact SET customer_id = :customerId WHERE customer_id=:oldCustomerId AND contact_id=:contactId";
                        $db = Yii::app()->db;
                        $command = $db->createCommand($sql);
                        $command->bindValues(array(':customerId' => $model->customer_id, ':oldCustomerId' => $model->old_customer_id, ':contactId' => $model->id));

                        if ($command->execute() > 0) {
                            $transaction->commit();

                            $this->redirect(array('view', 'id' => $model->id));
                        }
                    }  else {
                        $transaction->commit();
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                    
                    $transaction->rollBack();
                    
                }
            }
        } catch (Exception $e) {
            
            $transaction->rollBack();
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
            // we only allow deletion via POST request

            $model = $this->loadModel($id);
            $model->active = 0;
            $model->save();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider(
                        'Contact',
                        array(
                            'criteria' => array(
                                'condition' => 'active=1',
                            ),
                            'pagination' => array(
                                'pageSize' => 20,
                            ),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Contact('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Contact']))
            $model->attributes = $_GET['Contact'];

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
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Contact::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
