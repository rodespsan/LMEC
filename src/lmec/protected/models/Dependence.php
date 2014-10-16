<?php

/**
 * This is the model class for table "{{dependence}}".
 *
 * The followings are the available columns in table '{{dependence}}':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $telephone_number
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 */
class Dependence extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Dependence the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{dependence}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, address, telephone_number, active', 'required'),
            array('name', 'unique'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 45),
			array('address', 'length', 'max' => 300),
            array('telephone_number', 'length', 'max' => 15),
            array('extension', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, address, telephone_number, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'customers' => array(self::HAS_MANY, 'Customer', 'dependence_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Nombre de dependencia',
            'address' => 'Dirección',
            'telephone_number' => 'Número telefónico',
            'extension' => 'Extensión',
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
        $criteria->compare('address', $this->address, true);
        $criteria->compare('telephone_number', $this->telephone_number, true);
        $criteria->compare('extension', $this->extension, true);
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

    public static function getActiveDependencies() {
        $dependencies = array('' => "Seleccionar");
        $dependencies += CHtml::ListData(Dependence::model()->findAll('t.active = 1'), 'id', 'name');
        return $dependencies;
    }

    /*public function onBeforeValidate($event) {
        foreach ($this->getIterator() as $atributo => $valor)
            $this[$atributo] = trim($valor);
    }*/

}