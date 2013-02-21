<?php

class CustomerController extends Controller {

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
                'actions' => array('create', 'update'),
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
        $model = $this->loadModel($id);
        $model->contact = $model->contacts[0];
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Customer;
        $model->contact = new Contact;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        
            
        if (isset($_POST['Customer'])) {
            //var_dump( $_POST['Customer']);
            //var_dump( $_POST['Contact']);
            //Yii::app()->end();
            $model->attributes = $_POST['Customer'];
            $model->active = 1;
            $model->contact->active = 1;
            
            if(isset($_POST['Contact'])){
                $model->contact->setAttributes($_POST['Contact']);
                $correcto = $model->contact->validate();
            }
            $correcto = $correcto && $model->validate();
            /*var_dump($model);
            echo 'Contacto*****************+';
            var_dump($modelCont);
             * 
             */
            
            //Yii::app()->end();
            $transaction = Yii::app()->db->beginTransaction();
            $correcto = $correcto && $model->contact->save();
            
            if ($correcto){
                $criteria = new CDbCriteria;
                $criteria->compare('name',$model->contact->name);
		$criteria->compare('email',$model->contact->email);
		$criteria->compare('cell_phone_number',$model->contact->cell_phone_number);
		$criteria->compare('telephone_number_house',$model->contact->telephone_number_house);
		$criteria->compare('telephone_number_office',$model->contact->telephone_number_office);
		$criteria->compare('extension_office',$model->contact->extension_office);
		$criteria->compare('active',1);
                $model->contact = Contact::model()->find($criteria);
                
                //$model->contact_id = $model->contact->id;
                $correcto = $model->save();
                if($correcto){
                    $connection = Yii::app()->db;
                    /*var_dump(array($model->id,$model->contact->id));
                    echo $model->id;
                    Yii::app()->end();*/
                    //$sql = "INSERT INTO tbl_customer_contact('customer_id', 'contact_id') VALUES ("+$model->id+", "+$model->contact->id+")";
                    //$command=$connection->createCommand($sql);
                    //$rowCount=$command->execute();
                    $model_customer_contact = new CustomerContact();
                    $model_customer_contact->customer_id = $model->id;
                    $model_customer_contact->contact_id = $model->contact->id;
                    if($model_customer_contact->save()){
                        $transaction->commit();
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            }            
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
        $model->contact = $model->contacts[0];

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            $model->active = 1;
            $transaction = Yii::app()->db->beginTransaction();
            $correcto = $model->save();
            if(isset($_POST['Customer'])){
                $model->contact->setAttributes($_POST['Contact']);
                $model->contact->active = 1;
            }
            $correcto = $correcto && $model->contact->save();
            if ($correcto){
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->id));
            }
            
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
            //$this->loadModel($id)->delete();
            $model = $this->loadModel($id);            
            $model->active = 0;
            $model->contact->active = 0;
            $transaction = Yii::app()->db->beginTransaction();
            $correcto = $model->contact->save();
            if($correcto){
                $correcto = $model->save();
            }
            if($correcto){
                $transaction->commit();
            }else{          
                $transaction->rollBack();
            }
            

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider(
                        'Customer',
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
        $model = new Customer('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        
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
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
