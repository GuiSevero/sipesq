<?php

/**
 * This is the model class for table "funcoes_pessoa".
 *
 * The followings are the available columns in table 'funcoes_pessoa':
 * @property integer $cod_funcao
 * @property string $funcao
 * @property integer $cod_pessoa
 *
 * The followings are the available model relations:
 * @property Pessoa $pessoa
 */
class FuncoesPessoa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FuncoesPessoa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'funcoes_pessoa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('funcao, cod_pessoa', 'required'),
			array('cod_pessoa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_funcao, funcao, cod_pessoa', 'safe', 'on'=>'search'),
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
			'pessoa' => array(self::BELONGS_TO, 'Pessoa', 'cod_pessoa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_funcao' => 'ID',
			'funcao' => 'Função',
			'cod_pessoa' => 'Pessoa',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cod_funcao',$this->cod_funcao);
		$criteria->compare('funcao',$this->funcao,true);
		$criteria->compare('cod_pessoa',$this->cod_pessoa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}