<?php

/**
 * This is the model class for table "atividade_secundaria".
 *
 * The followings are the available columns in table 'atividade_secundaria':
 * @property integer $cod_atividade
 * @property string $titulo
 * @property string $descricao
 * @property string $tipo
 * @property integer $prazo
 * @property string $id
 */
class AtividadeSecundaria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AtividadeSecundaria the static model class
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
		return 'atividade_secundaria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, descricao, tipo, prazo, id', 'required'),
			array('prazo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_atividade, titulo, descricao, tipo, prazo, id', 'safe', 'on'=>'search'),
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
			'cod_atividade' => 'Cod Atividade',
			'titulo' => 'Título',
			'descricao' => 'Descrição',
			'tipo' => 'Tipo',
			'prazo' => 'Prazo',
			'id' => 'Identificador',
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

		$criteria->compare('cod_atividade',$this->cod_atividade);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('prazo',$this->prazo);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}