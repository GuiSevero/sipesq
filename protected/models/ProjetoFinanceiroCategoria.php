<?php

/**
 * This is the model class for table "projeto_financeiro_categoria".
 *
 * The followings are the available columns in table 'projeto_financeiro_categoria':
 * @property integer $cod_categoria
 * @property string $nome
 *
 * The followings are the available model relations:
 * @property ProjetoFinanceiro[] $projetoFinanceiros
 */
class ProjetoFinanceiroCategoria extends CActiveRecord
{
	public $nome_exibicao;
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProjetoFinanceiroCategoria the static model class
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
		return 'projeto_financeiro_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_categoria, nome', 'safe', 'on'=>'search'),
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
			//'projetoFinanceiros' => array(self::HAS_MANY, 'ProjetoFinanceiro', 'tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_categoria' => 'Código da Categoria',
			'nome' => 'Nome',
		);
	}
	protected function beforeSave(){
		 $nome = preg_replace('/\s\s+/', '_', $this->nome);
		 $this->nome = strtolower($nome);
		 parent::beforeSave();
	}
	
	protected function afterFind(){
		$nome = str_replace('_', ' ',$this->nome);
		$this->nome_exibicao = ucwords($nome);
		parent::afterFind();
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

		$criteria->compare('cod_categoria',$this->cod_categoria);
		$criteria->compare('nome',$this->nome,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}