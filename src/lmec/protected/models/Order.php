<?php

/**
 * This is the model class for table "tbl_order".
 *
 * The followings are the available columns in table 'tbl_order':
 * @property string $id
 * @property string $customer_id
 * @property string $receptionist_user_id
 * @property string $payment_type_id
 * @property string $model_id
 * @property string $service_type_id
 * @property string $date_hour
 * @property string $advance_payment
 * @property string $serial_number
 * @property string $stock_number
 * @property string $name_deliverer_equipment
 *
 * The followings are the available model relations:
 * @property TblAccesoryOrder[] $tblAccesoryOrders
 * @property TblActivityVerificationOrder[] $tblActivityVerificationOrders
 * @property TblBlogGuarantee[] $tblBlogGuarantees
 * @property TblBlogOrder[] $tblBlogOrders
 * @property TblBlogSpare[] $tblBlogSpares
 * @property TblBlogStatusOrder[] $tblBlogStatusOrders
 * @property TblDiagnostic[] $tblDiagnostics
 * @property TblEquipmentStatus[] $tblEquipmentStatuses
 * @property TblFailureDescription[] $tblFailureDescriptions
 * @property TblFinalStatusOrder[] $tblFinalStatusOrders
 * @property TblObservationOrder[] $tblObservationOrders
 * @property TblCustomer $customer
 * @property TblModel $model
 * @property TblPaymentType $paymentType
 * @property TblServiceType $serviceType
 * @property TblUser $receptionistUser
 * @property TblOutOrder[] $tblOutOrders
 * @property TblQuotationOrder[] $tblQuotationOrders
 * @property TblRepair[] $tblRepairs
 * @property TblServiceOrder[] $tblServiceOrders
 * @property TblServicePerformedOrder[] $tblServicePerformedOrders
 * @property TblSpareOrder[] $tblSpareOrders
 * @property TblTechnicalOrder[] $tblTechnicalOrders
 * @property TblWorkOrder[] $tblWorkOrders
 */
class Order extends CActiveRecord {

    public $_dependences;
    public $_failureDescription;
    public $_equipmentStatus;
    public $accesory_id;
    public $accesory;
    public $type_search;
    public $status_search;
    public $id_search;
    public $equipment_type_id;
    public $brand_id;
    public $service;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_id, contact_id, receptionist_user_id, payment_type_id, model_id, service_type_id, date_hour, name_deliverer_equipment, service', 'required', 'except'=>'ajaxupdate'),
            // array('service', 'required', 'except'=>'ajaxupdate'),
            array('customer_id', 'exist', 'className' => 'Customer', 'attributeName' => 'id'),
            array('contact_id', 'exist', 'className' => 'Contact', 'attributeName' => 'id'),
            array('receptionist_user_id', 'exist', 'className' => 'User', 'attributeName' => 'id'),
            array('payment_type_id', 'exist', 'className' => 'PaymentType', 'attributeName' => 'id'),
			array('equipment_type_id', 'exist', 'className' => 'EquipmentType', 'attributeName' => 'id'),
			array('brand_id', 'exist', 'className' => 'Brand', 'attributeName' => 'id'),
            array('customer_id, receptionist_user_id, payment_type_id, model_id, service_type_id', 'length', 'max' => 10),
            array('date_hour', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
            array('advance_payment', 'length', 'max' => 7),
            array('serial_number, stock_number', 'length', 'max' => 45),
            array('_dependences', 'length', 'max' => 45),
            array('name_deliverer_equipment', 'length', 'max' => 100),
            array('active', 'numerical', 'integerOnly' => true),
            array('accesory', 'CExistInArrayValidator', 'className' => 'Accesory', 'attributeName' => 'id'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
           array('id, customer_id, active, receptionist_user_id, technician_order_id, payment_type_id, model_id,status_order_id, service_type_id, date_hour, advance_payment, serial_number, stock_number, name_deliverer_equipment, _dependences', 'safe', 'on' => 'search'),
            array('type_search', 'safe', 'on'=>'search'),
            array('status_search, id_search', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'accesoryOrder' => array(self::HAS_MANY, 'AccesoryOrder', 'order_id'),
            'accessories' => array(self::MANY_MANY, 'Accesory', 'tbl_accesory_order(order_id,accesory_id)'),
//            'tblActivityVerificationOrders' => array(self::HAS_MANY, 'TblActivityVerificationOrder', 'order_id'),
//            'tblBlogGuarantees' => array(self::HAS_MANY, 'TblBlogGuarantee', 'order_id'),
//            'tblBlogOrders' => array(self::HAS_MANY, 'TblBlogOrder', 'order_id'),
//            'tblBlogSpares' => array(self::HAS_MANY, 'TblBlogSpare', 'orden_id'),
//            'tblBlogStatusOrders' => array(self::HAS_MANY, 'TblBlogStatusOrder', 'order_id'),
//            'tblDiagnostics' => array(self::HAS_MANY, 'TblDiagnostic', 'order_id'),
//            'tblEquipmentStatuses' => array(self::HAS_MANY, 'TblEquipmentStatus', 'order_id'),
//            'tblFailureDescriptions' => array(self::HAS_MANY, 'TblFailureDescription', 'order_id'),
//            'tblFinalStatusOrders' => array(self::HAS_MANY, 'TblFinalStatusOrder', 'order_id'),
//            'tblObservationOrders' => array(self::HAS_MANY, 'TblObservationOrder', 'order_id'),
//			//'observationOrder' => array(self::BELONGS_TO, 'ObservationOrder', 'order_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'observationOrders' => array(self::HAS_ONE, 'ObservationOrder', 'order_id'),
            'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
            'tblAccesoryOrders' => array(self::HAS_MANY, 'TblAccesoryOrder', 'order_id'),
            'tblActivityVerificationOrders' => array(self::HAS_MANY, 'TblActivityVerificationOrder', 'order_id'),
            'tblBlogGuarantees' => array(self::HAS_MANY, 'TblBlogGuarantee', 'order_id'),
            'tblBlogOrders' => array(self::HAS_MANY, 'TblBlogOrder', 'order_id'),
            'tblBlogSpares' => array(self::HAS_MANY, 'TblBlogSpare', 'orden_id'),
            'blogStatusOrders' => array(self::HAS_MANY, 'BlogStatusOrder', 'order_id'),
            'tblDiagnostics' => array(self::HAS_MANY, 'TblDiagnostic', 'order_id'),
//            'tblEquipmentStatuses' => array(self::HAS_MANY, 'TblEquipmentStatus', 'order_id'),
//            'tblFailureDescriptions' => array(self::HAS_MANY, 'TblFailureDescription', 'order_id'),
            'tblFinalStatusOrders' => array(self::HAS_MANY, 'TblFinalStatusOrder', 'order_id'),
            'tblObservationOrders' => array(self::HAS_MANY, 'TblObservationOrder', 'order_id'),
            'modelo' => array(self::BELONGS_TO, 'Modelo', 'model_id'),
            'statusOrder' => array(self::BELONGS_TO, 'StatusOrder', 'status_order_id'),
            'paymentType' => array(self::BELONGS_TO, 'PaymentType', 'payment_type_id'),
            'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_type_id'),
            'receptionistUser' => array(self::BELONGS_TO, 'User', 'receptionist_user_id'),
            'tblOutOrders' => array(self::HAS_MANY, 'TblOutOrder', 'order_id'),
            'tblQuotationOrders' => array(self::HAS_MANY, 'TblQuotationOrder', 'order_id'),
            'tblRepairs' => array(self::HAS_MANY, 'Repair', 'order_id'),
            'serviceOrders' => array(self::HAS_MANY, 'ServiceOrder', 'order_id'),
            'tblServicePerformedOrders' => array(self::HAS_MANY, 'TblServicePerformedOrder', 'order_id'),
            'tblSpareOrders' => array(self::HAS_MANY, 'TblSpareOrder', 'order_id'),
            'tblTechnicalOrders' => array(self::HAS_MANY, 'TblTechnicalOrder', 'order_id'),
            //'tblWorkOrders' => array(self::HAS_MANY, 'TblWorkOrder', 'order_id'),
            'technicianUser' => array(self::BELONGS_TO, 'User', 'technician_order_id'),
            'equipmentStatuses' => array(self::HAS_MANY, 'EquipmentStatus', 'order_id'),
            'failureDescriptions' => array(self::HAS_MANY, 'FailureDescription', 'order_id'),
			'spareParts' => array(self::MANY_MANY, 'SpareParts', 'tbl_spare_parts_order(order_id,spare_parts_id)'),
			'works' => array(self::MANY_MANY, 'Work', 'tbl_work_order(order_id,work_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Folio',
            'customer_id' => 'Cliente',
            'customer_name' => 'Nombre de Cliente',
            'contact_id' => 'Contacto',
            'receptionist_user_id' => 'Receptionista',
            'payment_type_id' => 'Tipo de pago',
            'model_id' => 'Modelo',
            'service_type_id' => 'Tipo de Servicio',
            'date_hour' => 'Fecha',
            'advance_payment' => 'Pago adelantado',
            'serial_number' => 'Número de serie',
            'stock_number' => 'Número de Inventario',
            'name_deliverer_equipment' => 'Nombre de quien entrega el equipo',
            '_failureDescription' => 'Descripción de la falla',
            '_equipmentStatus' => 'Estado del Equipo',
            '_dependences' => 'Dependencia',
            '_brand' => 'Marca',
            'equipment_type_id' => 'Tipo de Equipo',
            'brand_id' => 'Marca',
            'accesory_id' => 'Accesorio',
            'accesory' => 'Accesorio(s)',
            'status_order_id' => 'Estado',
            'type_search' => 'Tipo',
            'status_search' => 'Estado',
            'technician_order_id' => 'Tecnico',
            'active' => 'Activo',
            'observation' => 'Observación',
            'service'=>'Servicio',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.



        $criteria = new CDbCriteria;



//        $criteria->compare('id', $this->id, true);
//        $criteria->compare('customer_id', $this->customer_id, true);
//        $criteria->compare('receptionist_user_id', $this->receptionist_user_id, true);
//        $criteria->compare('payment_type_id', $this->payment_type_id, true);
//        $criteria->compare('model_id', $this->model_id, true);
//        $criteria->compare('service_type_id', $this->service_type_id, true);
//        $criteria->compare('date_hour', $this->date_hour, true);
//        $criteria->compare('advance_payment', $this->advance_payment, true);
//        $criteria->compare('serial_number', $this->serial_number, true);
//        $criteria->compare('_dependences', $this->_dependences, true);
//        $criteria->compare('stock_number', $this->stock_number, true);
//        $criteria->compare('name_deliverer_equipment', $this->name_deliverer_equipment, true);

        $criteria->with = array('modelo.EquipmentType', 'serviceType', 'technicianUser', 'statusOrder');

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('customer_id', $this->customer_id, true);
        $criteria->compare('receptionist_user_id', $this->receptionist_user_id, true);
        $criteria->compare('payment_type_id', $this->payment_type_id, true);
        $criteria->compare('serviceType.name', $this->service_type_id, true);
        $criteria->compare('service', $this->service, true);
        $criteria->compare('date_hour', $this->date_hour, true);
        $criteria->compare('advance_payment', $this->advance_payment, true);
       
        $criteria->compare('serial_number', $this->serial_number, true);
        $criteria->compare('_dependences', $this->_dependences, true);
        $criteria->compare('stock_number', $this->stock_number, true);
        $criteria->compare('name_deliverer_equipment', $this->name_deliverer_equipment, true);
        $criteria->addSearchCondition('LOWER(modelo.name)', strtolower($this->model_id));
        $criteria->compare('EquipmentType.type', $this->type_search, true);
        $criteria->compare('statusOrder.status', $this->status_order_id, true);
        $criteria->compare('technicianUser.user', $this->technician_order_id, true);
        $criteria->compare('t.active', $this->active, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
            )
        ));
    }

    public function getUserLogued() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        return $user->name . " " . $user->last_name;
    }

    public function getTipoPago() {
        return $ModelDependencias = PaymentType::model()->findAll('active = 1');
    }

    public function getDependencias() {
        //return $ModelDependencias = Dependences::model()->findAll('active = 1');
        return $ModelDependencias = Accesory::model()->findAll('active = 1');
    }

    /**
     * Datos relevantes para el equipo entrante.
     */
    public function getTipoEquipo() {
        return $ModelEquipos = EquipmentType::model()->findAll('active = 1');
    }

    public function getMarca() {
        return $ModelBrands = Brand::model()->findAll('active = 1');
    }

    public function getModelos() {
        return $ModelModels = Model::model()->findAll('active = 1');
    }

    /**
     * Datos para llenar las tablas de productos
     */
    public function getServicios() {
        return $ModelDependencias = Accesory::model()->findAll('active = 1');
    }

    public function getEquipmentType() {
        return $this->model->EquipmentType->type;
    }

    //Lista de contactos que estan activos del cliente del cliente, el valor por defecto es el seleccionado de la orden de entrada
    public function getContacts() {
        
         
        $foundContact = Contact::model()->find('id=' . $this->contact_id);
         
        $model = $this->contact;
        
        $contactActive = CHtml::listData($model, 'id', 'name');
        
   
        
        $listData = array($foundContact->id => $foundContact->name) /*+ $contactActive[1];*/;
        return $listData;
    }
	
	public function getServiceOrder(){
		return ServiceOrder::model()->find(array(
			'condition' => 'order_id = :order_id',
			'order' => 'date DESC',
			'params' => array(
				':order_id' => $this->id
			)
		));
	}

    /*
      public function getcontact()
      {
      $contact = Contact::model()->find('id='.$this->contact_id);
      return $contact->name;
      }
     */

    // Muestra en el menu la opcion de ver salida si esta ya fue creada.
    public function enableOutput() {
        $out = OutOrder::model()->find('order_id=' . $this->id . '');
        if ($out == null)
            return true;
        else
            return false;
    }

    /*
      public function getAccesories() {
      return $ModelDependencias = Accesory::model()->findAll('active = 1');
      }

      public function getWorks(){
      $modelWorks= CHtml::listData(Order::model()->works,'id','name');
      return $modelWorks;
      }
     */

    public static function getActive($active) {

        if ($active == '1') {

            return 'Si';
        } else if ($active == '0') {

            return 'No';
        }
    }

    public function getFolio() {
        return str_pad($this->id, 5, "0", STR_PAD_LEFT);
    }

    public function getFolio_($id) {
        return CHtml::encode(str_pad($id, 5, "0", STR_PAD_LEFT));
    }

    public function getClientNumber() {
        return str_pad($this->customer_id, 5, "0", STR_PAD_LEFT);
    }

    public function getStatusOrder($id) {
        $model = Order::model()->loadModel($id);
        if ($model->status_order_id == 2 || $model->status_order_id == 3) {
            return true;
        } else {
            return false;
        }
    }

//    public function getStatus_diagnostic_order($id) {
//        $model = Order::model()->findByPk($id);
//        if ($model->status_order_id == 2 || $model->status_order_id == 3) {
//            return true;
//        } else {
//            return false;
//        }
//    }

//    public function getStatus_refection_order($id) {
//        $model = Order::model()->findByPk($id);
//        if ($model->status_order_id == 8) {
//            return true;
//        } else {
//            return false;
//        }
//    }

//    public function getStatus_repair_order($id) {
//        $model = Order::model()->findByPk($id);
//        if ($model->status_order_id == 11) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function getStatus_print_order($id) {
        $model = Order::model()->findByPk($id);
        if ($model->status_order_id == 16 || $model->status_order_id == 17) {
            return true;
        } else {
            return false;
        }
    }
    
    
      public function getStatus_diagnostic_order($id)
    {
        $model=Order::model()->findByPk($id);
		if($model->technician_order_id==Yii::app()->user->id)
		{
                if($model->status_order_id==4) //si la orden esta en diagnóstico finalizado
                return false;				
				$modelUserRole = UserRole::model()->find(
				'user_id=:user_id  AND role_id=:role_id',
				array(
					':user_id'=>$model->technician_order_id,
					':role_id'=>2,
				));		
				if (!empty($modelUserRole))
				{
					if($model->status_order_id==2 || $model->status_order_id==3) // si la orden esta en espera o en diagnóstico
					{
						return true;
					}
					else{
						return false;
					}
				}else{
					return false;
				}
			
		}else{
			return false;		
		}
    }
	
    public function getStatus_refection_order($id)
    {
        $model=Order::model()->findByPk($id);
        if($model->status_order_id==5){
            return true;
        }
        else{
            return false;
        }
     
    }
    public function getStatus_repair_order($id)
    {
        $model=Order::model()->findByPk($id);
		if($model->technician_order_id==Yii::app()->user->id)
		{
                if($model->status_order_id==11)    //si la orden esta reparada
                return false;				
				$modelUserRole = UserRole::model()->find(
				'user_id=:user_id  AND role_id=:role_id',
				array(
					':user_id'=>$model->technician_order_id,
					':role_id'=>2,
				));		
				if (!empty($modelUserRole))
				{
					if($model->status_order_id==8 || $model->status_order_id==9) //si la orden esta en espera de reparacion o en refaccion
					{
						return true;
					}
					else{
						return false;
					}
				}else{
					return false;
				}
			
		}else{
			return false;		
		}	
	}

    public function getStatus_ready_order($id) {
        $model = Order::model()->findByPk($id);
        if ($model->status_order_id == 13) {
            return true;
        } else {
            return false;
        }
    }

	public function getFirstService() {
		$services = $this->serviceOrders;
		$result = reset($services);

		return $result; 
	}
}
