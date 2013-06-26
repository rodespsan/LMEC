<?php

/**
 * This is the model class for table "{{provider}}".
 *
 * The followings are the available columns in table '{{provider}}':
 * @property string $id
 * @property string $provider_name
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_telephone_number
 * @property string $address
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property ProviderSpare[] $providerSpares
 */
class Provider extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Provider the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{provider}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, contact_name, active', 'required'),
            array('name', 'unique'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name, contact_name, contact_email, address', 'length', 'min' => 1, 'max' => 45),
            array('contact_telephone_number', 'length', 'max' => 15),
            array('contact_email', 'email'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, contact_name, contact_email, contact_telephone_number, address, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'providerSpares' => array(self::HAS_MANY, 'ProviderSpare', 'provider_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Nombre de proveedor',
            'contact_name' => 'Nombre de contacto',
            'contact_email' => 'Correo electrónico',
            'contact_telephone_number' => 'Teléfono de contacto',
            'address' => 'Dirección',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('contact_telephone_number', $this->contact_telephone_number, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                ));
    }

    public static function getActive($active) {
        if ($active == '1') {
            return 'Si';
        } else if ($active == '0') {
            return 'No';
        }
    }
    
    
    public function onBeforeValidate(){
        foreach($this->getIterator() as $atributo=>$valor)
            $this[$atributo] = trim($valor);
    }

}