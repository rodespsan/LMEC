<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property string $id
 * @property string $name
 * @property string $dependence_id
 * @property string $address
 * @property string $customer_type_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CustomerType $customerType
 * @property Dependence $dependence
 * @property CustomerContact[] $customerContacts
 * @property Order[] $orders
 */
class Customer extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Customer the static model class
     */
    public $contact = null;
    public $nombreContacto = "";

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{customer}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'min' => 1, 'max' => 100),
            array('customer_type_id', 'required', 'message' => 'Seleccione un tipo de cliente.'),
            array('address', 'length', 'max' => 200),
            array('dependence_id', 'safe'),
            array('nombreContacto', 'length', 'max' => 100), /////
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id,name, nombreContacto, customer_type_id, address, dependence_id, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'contacts' => array(self::MANY_MANY, 'Contact', 'tbl_customer_contact(customer_id,contact_id)'),
            //'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
            'customerType' => array(self::BELONGS_TO, 'CustomerType', 'customer_type_id'),
            'dependence' => array(self::BELONGS_TO, 'Dependence', 'dependence_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'customer_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Nombre',
            'customer_type_id' => 'Tipo de cliente',
            'contact_id' => 'Contacto',
            'address' => 'Dirección',
            'dependence_id' => 'Dependencia',
            'nombreContacto' => 'Nombre(s) de contacto(s)',
            'active' => 'Activo',
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
        $criteria->select = "t.id, t.name, t.dependence_id, t.address, t.customer_type_id, t.active";
        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.name', $this->name, true);
        //$criteria->compare('dependence_id',$this->dependence_id,true);
        $criteria->compare('D.name', $this->dependence_id, true);
        $criteria->compare('t.address', $this->address, true);
        //$criteria->compare('customer_type_id',$this->customer_type_id,true);
        $criteria->compare('CO.name', $this->nombreContacto, true);
        $criteria->compare('C.type', $this->customer_type_id, true);
        $criteria->compare('t.active', $this->active);

        //$criteria->compare('D.name',$this->dependence_id,true);
        //$criteria->compare('CO.name',$this->nombreContacto,true);
        $criteria->join = 'INNER JOIN tbl_customer_type AS C ON C.id = t.customer_type_id LEFT JOIN tbl_dependence AS D ON D.id = t.dependence_id INNER JOIN tbl_customer_contact AS CC ON CC.customer_id=t.id INNER JOIN tbl_contact AS CO ON CO.id = CC.contact_id';
        $criteria->group = 't.id, t.customer_type_id, t.address, t.dependence_id';

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                ));
    }

    public static function getContacts($iClient_id) {

        $sql = "SELECT C.name from tbl_contact as C INNER JOIN tbl_customer_contact as CC on C.id = CC.contact_id INNER JOIN tbl_customer as CS on CC.customer_id = CS.id where CS.id = $iClient_id";

        $sContacts = "";
        $dataReader = Yii::app()->db->createCommand($sql)->query();

        foreach ($dataReader as $row) {

            $sContacts .= $row['name'] . ",</br>";
        }
        return $sContacts;
    }

    public static function getActive($active) {
        if ($active == '1') {
            return 'Si';
        } else if ($active == '0') {
            return 'No';
        }
    }

    public static function getActiveCustomers() {
        $customers = array('' => "Seleccionar");
        $customers += CHtml::ListData(Customer::model()->findAll('t.active = 1'), 'id', 'name');
        return $customers;
    }

}