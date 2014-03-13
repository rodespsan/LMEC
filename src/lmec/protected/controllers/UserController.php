<?php

class UserController extends Controller {

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
                'roles' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'activate'),
                'roles' => array('administrador'),
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
        //create is name of scenario
        $model = new User('scenarioCreate');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->encryptPassword();

            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($model->save()) {
				
					$successful = true ;
				
                    if($model->assignRolesToUser($model->id) == $successful)
					{
						$transaction->commit();
						$this->redirect(array('view', 'id' => $model->id));
					}
					else
					{
						$transaction->rollBack();
					}
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        if (Role::model()->count('active = 1') > 0) {
            $this->render('create', array(
                'model' => $model,
            ));
        } else if (Role::model()->count('active = 0') > 0) {
            throw new CHttpException(
                    '',
                    'Primero debes ' .
                    CHtml::link('crear rol', array('role/create')) .
                    ' o ' .
                    CHtml::link('activar ', array('role/admin')) . 'algún rol' . '.'
            );
        } else {
            throw new CHttpException(
                    '',
                    'Primero debes ' .
                    CHtml::link('crear rol', array('role/create')) . '.'
            );
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'scenarioUpdate';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $pre_selected_roles = $model->getExistingRolesOfUser($model->id);
        $model->_selected_roles = $pre_selected_roles;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($model->save()) {

					$model->deleteRolesOfUser($model->id) ;

                    if($model->assignRolesToUser($model->id) == $successful)
					{
						$transaction->commit();
						$this->redirect(array('view', 'id' => $model->id));
					}
					else
					{
						$transaction->rollBack();
					}
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        if (Role::model()->count('active = 1') > 0) {
            $this->render('update', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(
                    '',
                    'Primero debes ' .
                    CHtml::link('crear', array('role/create')) .
                    ' o ' .
                    CHtml::link('activar ', array('role/admin')) . 'algún rol' . '.'
            );
        }
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
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $model->active = 1;
            $model->save();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User', array(
                    'criteria' => array(
                        'condition' => 'active=1',
                    ),
                ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'attributes' => array('user', 'name', 'last_name', 'email')
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
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
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
