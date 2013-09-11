<?php

/**
 * This is the model class for table "patrimonio_termo".
 *
 * The followings are the available columns in table 'patrimonio_termo':
 * @property integer $cod_termo
 * @property integer $cod_projeto
 * @property string $orgao_responsavel
 * @property string $responsavel
 * @property string $co_responsavel
 * @property integer $nro_termo_responsabilidade
 * @property string $data_termo
 *
 * The followings are the available model relations:
 * @property PatrimonioItem[] $patrimonio_items
 * @property Projeto $projeto
 */
class PatrimonioTermo extends CActiveRecord
{
	
	public $valor_total=0;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PatrimonioTermo the static model class
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
		return 'patrimonio_termo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_projeto, orgao_responsavel, responsavel, co_responsavel, nro_termo_responsabilidade', 'required'),
			array('cod_projeto, nro_termo_responsabilidade', 'numerical', 'integerOnly'=>true),
			array('data_termo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_termo, cod_projeto, orgao_responsavel, responsavel, co_responsavel, nro_termo_responsabilidade, data_termo', 'safe', 'on'=>'search'),
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
			'patrimonio_items' => array(self::HAS_MANY, 'PatrimonioItem', 'cod_termo'),
			'projeto' => array(self::BELONGS_TO, 'Projeto', 'cod_projeto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_termo' => 'Código do Termo',
			'cod_projeto' => 'Projeto',
			'orgao_responsavel' => 'Orgão Responsável',
			'responsavel' => 'Responsável',
			'co_responsavel' => 'Co-Responsável',
			'nro_termo_responsabilidade' => 'Termo de Responsabilidade',
			'data_termo' => 'Data do Termo',
			'valor_total' => 'Valor Total',
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

		$criteria->compare('cod_termo',$this->cod_termo);
		$criteria->compare('cod_projeto',$this->cod_projeto);
		$criteria->compare('orgao_responsavel',$this->orgao_responsavel,true);
		$criteria->compare('responsavel',$this->responsavel,true);
		$criteria->compare('co_responsavel',$this->co_responsavel,true);
		$criteria->compare('nro_termo_responsabilidade',$this->nro_termo_responsabilidade);
		$criteria->compare('data_termo',$this->data_termo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function afterFind(){
		
		$this->valor_total = 0;
		foreach($this->patrimonio_items as $item){
			$this->valor_total += $item->valor;
		}
		
	}
}