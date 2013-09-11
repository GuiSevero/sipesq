<?php

/**
 * This is the model class for table "projeto_financeiro".
 *
 * The followings are the available columns in table 'projeto_financeiro':
 * @property integer $cod_projeto_financeiro
 * @property integer $cod_projeto
 * @property string $descricao
 * @property integer $tipo
 * @property string $responsavel
 * @property double $valor
 * @property string $arquivo
 *
 * The followings are the available model relations:
 * @property Projeto $projeto
 * @property ProjetoFinanceiroCategoria $categoria
 */
class ProjetoFinanceiro extends CActiveRecord
{
	
	public  $file;
	public  $href;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProjetoFinanceiro the static model class
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
		return 'projeto_financeiro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_projeto, tipo, valor', 'required'),
			array('cod_projeto, tipo', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('descricao, responsavel, arquivo', 'safe'),
			array('file', 'file',
				 'allowEmpty'=>true,
				 
					),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_projeto_financeiro, arquivo, cod_projeto, descricao, tipo, responsavel, valor', 'safe', 'on'=>'search'),
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
			'projeto' => array(self::BELONGS_TO, 'Projeto', 'cod_projeto'),
			'categoria' => array(self::BELONGS_TO, 'ProjetoFinanceiroCategoria', 'tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_projeto_financeiro' => 'ID',
			'cod_projeto' => 'Projeto',
			'descricao' => 'Descrição',
			'tipo' => 'Tipo',
			'responsavel' => 'Responsável',
			'valor' => 'Valor',
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

		$criteria->compare('cod_projeto_financeiro',$this->cod_projeto_financeiro);
		$criteria->compare('cod_projeto',$this->cod_projeto);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('responsavel',$this->responsavel,true);
		$criteria->compare('valor',$this->valor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*
	protected function beforeSave(){
		$this->projeto->ultima_modificacao = date("Y-m-d");
		$this->projeto->save();	
		return true;
	}
	*/
	
	public function afterFind(){
		if($this->arquivo!=null)
			$this->href = CHtml::link('Download', $this->arquivo, array('target'=>'_blank'));
		else 
			$this->href = 'Não há anexo';
		parent::afterFind();
	}
	
}