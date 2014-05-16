<?php

/**
 * This is the model class for table "t_devices".
 *
 * The followings are the available columns in table 't_devices':
 * @property integer $id_device
 * @property integer $id_organization
 * @property integer $id_branch
 * @property integer $id_department
 * @property integer $id_cabinet
 * @property integer $id_employee
 * @property integer $id_type
 * @property string $name
 * @property string $description
 * @property integer $inv_number
 * @property string $sn
 * @property integer $year
 * @property integer $end_varantly_yesr
 * @property string $service
 * @property integer $expluatation
 * @property string $expluatation_data
 * @property integer $private
 * @property integer $break
 */
class Device extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_organization, id_branch, id_department, id_cabinet, id_employee, id_type, inv_number, year, end_varantly_yesr, expluatation, private, break', 'numerical', 'integerOnly'=>true),
			array('name, description, sn, service', 'length', 'max'=>255),
			array('expluatation_data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_device, id_organization, id_branch, id_department, id_cabinet, id_employee, id_type, name, description, inv_number, sn, year, end_varantly_yesr, service, expluatation, expluatation_data, private, break', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'devicepc' => array(self::BELONGS_TO, 'DevicePc', 'id_device'),
			//'devicepc' => array(self::HAS_ONE, 'DevicePc', 'id_device_pc'),
			'devicepc' => array(self::BELONGS_TO, 'DevicePc', array('id_device'=>'id_device_pc')),
			'devicetype' => array(self::BELONGS_TO, 'DeviceType', 'id_type'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_device' => 'Id Device',
			'id_organization' => 'Id Organization',
			'id_branch' => 'Id Branch',
			'id_department' => 'Id Department',
			'id_cabinet' => 'Id Cabinet',
			'id_employee' => 'Id Employee',
			'id_type' => 'Id Type',
			'name' => 'Name',
			'description' => 'Description',
			'inv_number' => 'Inv Number',
			'sn' => 'Sn',
			'year' => 'Year',
			'end_varantly_yesr' => 'End Varantly Yesr',
			'service' => 'Service',
			'expluatation' => 'Expluatation',
			'expluatation_data' => 'Expluatation Data',
			'private' => 'Private',
			'break' => 'Break',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_device',$this->id_device);
		$criteria->compare('id_organization',$this->id_organization);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_department',$this->id_department);
		$criteria->compare('id_cabinet',$this->id_cabinet);
		$criteria->compare('id_employee',$this->id_employee);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('inv_number',$this->inv_number);
		$criteria->compare('sn',$this->sn,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('end_varantly_yesr',$this->end_varantly_yesr);
		$criteria->compare('service',$this->service,true);
		$criteria->compare('expluatation',$this->expluatation);
		$criteria->compare('expluatation_data',$this->expluatation_data,true);
		$criteria->compare('private',$this->private);
		$criteria->compare('break',$this->break);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Device the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
