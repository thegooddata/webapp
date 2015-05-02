<?php

/**
 * This is the model class for table "{{usage_data_total}}".
 *
 * The followings are the available columns in table '{{usage_data_total}}':
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $subname
 * @property integer $value
 * @property string $created_at
 * @property string $updated_at
 */
class UsageDataTotal extends CActiveRecord
{
  
  /**
   * List of configuration names that we allow to save.
   */
  private static $_allowed_keys=array(
      'queries',
      'browsing',
      'adtracks',
      'adtracksBlocked',
      'adtracksAllowed',
      'adtracksSources',
  );
  
  static public function getAllowedKeys() {
    return self::$_allowed_keys;
  }
  
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{usage_data_total}}';
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
			array('name, subname', 'length', 'max'=>255),
			array('name','in','range'=>self::$_allowed_keys,'allowEmpty'=>false),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			array('id, member_id, name, subname, value, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'subname' => 'Sub Name',
			'value' => 'Value',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('subname',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

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

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created_at = new CDbExpression('NOW()');

        $this->updated_at = new CDbExpression('NOW()');

        return parent::beforeSave();
    }

    public static function getTotalUsageData($name, $member_id = 0){
        if($name == 'adtracksSources'){
            $total = Yii::app()->db->createCommand("
                SELECT SUM(value)
                    FROM tbl_usage_data_total
                    WHERE name = '$name' AND member_id = $member_id)
                ")->queryAll();
        }else{
            $total = Yii::app()->db->createCommand("
                SELECT SUM(value)
                    FROM tbl_usage_data_total
                    WHERE name = '$name' AND member_id = $member_id)
                ")->queryScalar();
        }
        return $total;

    }
}









