<?php

/**
 * This is the model class for table "patrimonio_item".
 *
 * The followings are the available columns in table 'patrimonio_item':
 * @property integer $cod_item
 * @property integer $cod_termo
 * @property string $nome
 * @property integer $nro_patrimonio
 * @property double $valor
 * @property string $descricao
 * @property string $localizacao
 * @property string $data_aquisicao
 * @property string $vendedor
 * @property integer $cod_categoria
 *
 * The followings are the available model relations:
 * @property PatrimonioTermo $termo
 * @property PatrimonioCategoria $codCategoria
 */
class PatrimonioItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PatrimonioItem the static model class
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
		return 'patrimonio_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, nro_patrimonio, descricao', 'required'),
			array('cod_termo, nro_patrimonio, cod_categoria', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('localizacao, data_aquisicao, vendedor', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_item, cod_termo, nome, nro_patrimonio, valor, descricao, localizacao, data_aquisicao, vendedor, cod_categoria', 'safe', 'on'=>'search'),
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
			'termo' => array(self::BELONGS_TO, 'PatrimonioTermo', 'cod_termo'),
			'codCategoria' => array(self::BELONGS_TO, 'PatrimonioCategoria', 'cod_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_item' => 'ID',
			'cod_termo' => 'Termo de Patrimônio',
			'nome' => 'Nome',
			'nro_patrimonio' => 'Número do Patrimonio',
			'valor' => 'Valor',
			'descricao' => 'Descrição',
			'localizacao' => 'Localização',
			'data_aquisicao' => 'Data Aquisição',
			'vendedor' => 'Vendedor',
			'cod_categoria' => 'Categoria',
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

		$criteria->compare('cod_item',$this->cod_item);
		$criteria->compare('cod_termo',$this->cod_termo);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('nro_patrimonio',$this->nro_patrimonio);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('localizacao',$this->localizacao,true);
		$criteria->compare('data_aquisicao',$this->data_aquisicao,true);
		$criteria->compare('vendedor',$this->vendedor,true);
		$criteria->compare('cod_categoria',$this->cod_categoria);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}