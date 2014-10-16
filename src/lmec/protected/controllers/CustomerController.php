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
        $model = $this->loadModel($id);
        $model->contact = ($model->contacts != NULL)?$model->contacts[0]:NULL;
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (CustomerType::model()->count('active=1') == 0) {
            throw new CHttpException(412, 'No hay tipos de clientes activos. Para crear un cliente, primero debe ' . CHtml::link('crear un tipo de cliente', array('customerType/create')) . '.');
        }
		
        $model = new Customer;
        $model->contact = new Contact;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            $model->dependence_id = ($model->dependence_id == '') ? NULL : $model->dependence_id;
            $model->contact->active = $model->active;

            if (isset($_POST['Contact'])) {
                $model->contact->attributes = $_POST['Contact'];
                $successful = $model->contact->validate();
            }

            $successful = $model->validate() && $successful;
			if($successful)
			{
				$transaction = Yii::app()->db->beginTransaction();
				try
				{
					if( $model->save(false) )
					{
						$model->contact->customer_id = $model->id;
						if($model->contact->save(false))
						{
							$transaction->commit();
							if(!empty($_POST['yt1']))
							{
								Yii::app()->user->setFlash('customer-created', "¡El cliente <b><i>&quot;$model->name&quot;</i></b> fue creado exitosamente!");
								$this->redirect(array('create'));
							}
							else
								$this->redirect(array('view', 'id' => $model->id));
						}
					}
					$transaction->rollBack();
				} catch (Exception $e) {
					$transaction->rollBack();
				}
			}
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
        
        $transaction = Yii::app()->db->beginTransaction();
        
        try {            
            $model->contact = ($model->contacts != NULL)?$model->contacts[0]:NULL;


            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Customer'])) {
                $model->attributes = $_POST['Customer'];
                $model->dependence_id = ($model->dependence_id == '') ? NULL : $model->dependence_id;

                
                $successful = $model->save();
                if (isset($_POST['Customer'])) {
                    $model->contact->setAttributes($_POST['Contact']);
                    $model->contact->active = 1;
                }
                $successful = $successful && $model->contact->save();
                if ($successful) {
                    $transaction->commit();
                    $this->redirect(array('view', 'id' => $model->id));
                }

                $transaction->rollBack();
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
            //$this->loadModel($id)->delete();
            $model = $this->loadModel($id);
            $model->active = 0;

            $transaction = Yii::app()->db->beginTransaction();
            $successful = true;

            foreach ($model->contacts as $contact) {
                $contact->active = 0;
                $successful = $contact->save();
                if ($successful == false) {
                    break;
                }
            }

            if ($successful) {
                $successful = $model->save();
            }

            if ($successful) {
                $transaction->commit();
            } else {
                $transaction->rollBack();
            }


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

        $transaction = Yii::app()->db->beginTransaction();
        $successful = true;
        foreach ($model->contacts as $contact) {
            $contact->active = 1;
            $successful = $contact->save();
            if ($successful == false) {
                break;
            }
        }

        if ($successful) {
            $successful = $model->save();
        }

        if ($successful) {
            $transaction->commit();
        } else {
            $transaction->rollBack();
        }



        // if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
