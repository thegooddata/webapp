<?php

/**
 * This is the model class for table "{{extension_settings}}".
 *
 * The followings are the available columns in table '{{extension_settings}}':
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class ExtensionSettings extends CActiveRecord
{
  
  /**
   * List of configuration names that we allow to save.
   */
  private static $_allowed_keys=array(
    'store_navigation',
    'number_test',
    'string_test',
  );
  
  static public function getAllowedKeys() {
    return self::$_allowed_keys;
  }
  
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{extension_settings}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id', 'numerical', 'integerOnly'=>true),
			array('name, value', 'length', 'max'=>255),
			array('name','in','range'=>self::$_allowed_keys,'allowEmpty'=>false),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, member_id, name, value, created_at, updated_at', 'safe', 'on'=>'search'),
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
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('LOWER(name)',strtolower($this->name),true);
		$criteria->compare('LOWER(value)',strtolower($this->value),true);
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
	
	static public function setUserSetting($user_id, $name, $value) {
	  $model=ExtensionSettings::model()->findByAttributes(array(
	    'member_id'=>$user_id,
	    'name'=>$name,
    ));
    if (!$model) {
      $model= new ExtensionSettings();
      $model->member_id=$user_id;
      $model->name=$name;
    }
    $model->value=$value;
    return $model->save();
	}
	
	static public function getUserSettings($user_id) {
	  $result=array();
	  $models=ExtensionSettings::model()->findAllByAttributes(array(
	    'member_id'=>$user_id,
    ));
    if (is_array($models) && count($models)) {
      foreach ($models as $model) {
        $result[$model->name]=$model->value;
      }
    }
	  return $result;
	}
}









