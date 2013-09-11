<?php

/**
 * This is the model class for table "projeto_receita".
 *
 * The followings are the available columns in table 'projeto_receita':
 * @property integer $cod_receita
 * @property integer $cod_projeto
 * @property string $titulo
 * @property double $valor
 * @property string $anexo
 * @property string $descricao
 * @property string $data_criacao
 * @property string $data_edicao
 * @property integer $cod_criador
 * @property integer $tipo_receita
 *
 * The followings are the available model relations:
 * @property Projeto $codProjeto
 * @property Pessoa $codCriador
 */
class ProjetoReceita extends CActiveRecord
{
	
	//CLASSE NAO USADA
	const ORCAMENTADO = 0;
	const RECEBIDO = 1;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjetoReceita the static model class
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
		return 'projeto_receita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_projeto, titulo, valor', 'required'),
			array('cod_projeto, cod_criador', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('anexo, descricao, data_criacao, data_edicao', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_receita, cod_projeto, titulo, valor, anexo, descricao, data_criacao, data_edicao, cod_criador', 'safe', 'on'=>'search'),
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
			'codProjeto' => array(self::BELONGS_TO, 'Projeto', 'cod_projeto'),
			'codCriador' => array(self::BELONGS_TO, 'Pessoa', 'cod_criador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_receita' => 'Cod Receita',
			'cod_projeto' => 'Cod Projeto',
			'titulo' => 'Titulo',
			'valor' => 'Valor',
			'anexo' => 'Anexo',
			'descricao' => 'Descricao',
			'data_criacao' => 'Data Criacao',
			'data_edicao' => 'Data Edicao',
			'cod_criador' => 'Cod Criador',
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

		$criteria->compare('cod_receita',$this->cod_receita);
		$criteria->compare('cod_projeto',$this->cod_projeto);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('anexo',$this->anexo,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('data_criacao',$this->data_criacao,true);
		$criteria->compare('data_edicao',$this->data_edicao,true);
		$criteria->compare('cod_criador',$this->cod_criador);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}