<?php

class ModeloController extends Controller {

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
            array('allow', // Acciones permitidas al administrador y al recepcionista
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'activate'),
                'roles' => array('administrador', 'recepcionista'),
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
        $model = new Modelo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Modelo'])) {
            $model->attributes = $_POST['Modelo'];

            if ($model->save())
            {
                if (!empty($_POST['yt1'])) 
                {
                    Yii::app()->user->setFlash('modelo-created', "¡El modelo <b><i>&quot;$model->name&quot;</i></b> fue creado exitosamente!");
                    //$this->redirect(array('create'));
                    $modelSaved = $model;
                    $model = new Modelo;
                    $model ->equipment_type_id = $modelSaved ->equipment_type_id;
                    $model ->brand_id = $modelSaved ->brand_id;
                }
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
                
        }

        if (EquipmentType::model()->count('active = 1') == 0 && Brand::model()->count('active = 1') == 0) {
            throw new CHttpException('', 'Primero debe ' . CHtml::link('crear un Tipo de Equipo', array('equipmentType/create')) . ' y ' . CHtml::link('crear una Marca', array('brand/create')) . '.');
        } else {
            if (EquipmentType::model()->count('active = 1') == 0) {
                throw new CHttpException('', 'Primero debe ' . CHtml::link('crear un Tipo de Equipo', array('equipmentType/create')) . '.');
            } else {
                if (Brand::model()->count('active = 1') == 0) {
                    throw new CHttpException('', 'Primero debe ' . CHtml::link('crear una Marca', array('brand/create')) . '.');
                } else {
                    $this->render('create', array(
                        'model' => $model,
                    ));
                }
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Modelo'])) {
            $model->attributes = $_POST['Modelo'];
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
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Actives a particular model
     * If activation is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be actived.
     */
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
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Modelo', array(
                    'criteria' => array('condition' => 'active=1'),
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
        $model = new Modelo('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Modelo']))
            $model->attributes = $_GET['Modelo'];

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
        $model = Modelo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modelo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
