<?php

/**
 * This is the model class for table "{{usage_data_daily}}".
 *
 * The followings are the available columns in table '{{usage_data_daily}}':
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property integer $value
 * @property string $daydate

 */
class UsageDataDaily extends CActiveRecord
{
  
  /**
   * List of configuration names that we allow to save.
   */
  private static $_allowed_keys=array(
    'queries',
    'queriesShared',
    'browsing',
    'adtracks',
    'adtracksBlocked',
    'adtracksAllowed',
  );
  
  static public function getAllowedKeys() {
    return self::$_allowed_keys;
  }
  
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{usage_data_daily}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, value', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('name','in','range'=>self::$_allowed_keys,'allowEmpty'=>false),
			array('daydate', 'safe'),
			// The following rule is used by search().
			array('id, member_id, name, value, daydate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'member_id' => 'Member',
			'name' => 'Name',
			'value' => 'Value',
			'daydate' => 'Date',
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

		$criteria->compare('id',$this->id);
        $criteria->compare('member_id', $this->member_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('daydate',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExtensionSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getTotalUsageData($name, $member_id = 0, $period = 'month'){
        //$period = array('week', 'month', 'year');
        $total = Yii::app()->db->createCommand("
                SELECT SUM(value)
                    FROM tbl_usage_data_daily
                    WHERE name = '$name' AND member_id = $member_id AND daydate >= (now() - '1 $period'::interval)
                ")->queryScalar();

        return $total;
    }
}









