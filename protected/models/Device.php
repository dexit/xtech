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

	/*public $id;
	public $id_device_pc;
	public $mb;
	public $cpu_name;
	public $cpu_p;
	public $hdd_name;
	public $hdd_p;
	public $ram_name;
	public $ram_p;
	public $video_name;
	public $video_p;
	public $cdrom_name;
	public $lan_name;
	public $os;
	public $net_name;
	public $ip;*/

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

	/*public function behaviors()
	{
	    return array(
	        'activerecord-relation'=>array(
	            'class'=>'ext.yiiext.behaviors.activerecord-relation.EActiveRecordRelationBehavior',
	        ),
	    );
	}*/

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
			'organization' => array(self::BELONGS_TO, 'Organization', 'id_organization'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'id_branch'),
			'department' => array(self::BELONGS_TO, 'Department', 'id_department'),
			'cabinet' => array(self::BELONGS_TO, 'Cabinet', 'id_cabinet'),
			'employee' => array(self::BELONGS_TO, 'Employee', 'id_employee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_device' => 'Id Device',
			'id_organization' => 'Організація',
			'id_branch' => 'Корпус',
			'id_department' => 'Відділ',
			'id_cabinet' => 'Кабінет',
			'id_employee' => 'Співробітник',
			'id_type' => 'Тип пристрою',
			'name' => 'Назва',
			'description' => 'Опис',
			'inv_number' => 'Інв. номер',
			'sn' => 'Серійний номер',
			'year' => 'Рік випуску',
			'end_varantly_yesr' => 'Рік закінчення гарантії',
			'service' => 'Сервісний центр',
			'expluatation' => 'Введено в експлуатацію',
			'expluatation_data' => 'Дата введення в експлуатацію',
			'private' => 'Забалансовий',
			'break' => 'Стан',

			'id' => 'Id',
			'id_device_pc' => 'Id Device PC',
			'mb' => 'Материнська плата',
			'cpu_name' => 'Процесор',
			'cpu_p' => 'Швидкість процесора (ГГц)',
			'hdd_name' => 'Жорсткий диск',
			'hdd_p' => 'Об\'ем жорсткого диску (Гб)',
			'ram_name' => 'Оперативна пам\'ять',
			'ram_p' => 'Об\'ем оперативної пам\'яті (Мб)',
			'video_name' => 'Відеоадаптер',
			'video_p' => 'Об\'ем відеопам\'яті (Мб)',
			'cdrom_name' => 'CD/DVD привід',
			'lan_name' => 'Мережна карта',
			'os' => 'Операційна система',
			'net_name' => 'Мережне ім\'я',
			'ip' => 'IP адреса',
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

	/*protected function afterSave()
	{
		//parent::afterSave();
		//echo "after";

	}

	protected function beforeSave()
	{
		//parent::beforeSave();
		//echo "before";

		//var_dump($_POST);

		
	}*/
}
