<?php

/**
 * This is the model class for table "passos_construcao".
 *
 * The followings are the available columns in table 'passos_construcao':
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $prioridade
 * @property boolean $finalizado
 */
class PassosConstrucao extends CActiveRecord
{
	public $prioridade_nome;
	public $class;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PassosConstrucao the static model class
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
		return 'passos_construcao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, prioridade', 'required'),
			array('prioridade', 'numerical', 'integerOnly'=>true),
			array('descricao, finalizado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, descricao, prioridade, finalizado', 'safe', 'on'=>'search'),
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
			'nome' => 'Nome',
			'descricao' => 'Descricao',
			'prioridade' => 'Prioridade',
			'finalizado' => 'Finalizado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('prioridade',$this->prioridade);
		$criteria->compare('finalizado',$this->finalizado);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function afterFind(){
		
		switch ($this->prioridade){
			case 1: 
				$this->prioridade_nome = "Baixa"; 
				$this->class = "branco";
				break;
			case 2: 
				$this->prioridade_nome = "Média"; 
				$this->class = "amarelo";
				break;
			case 3:
				$this->prioridade_nome = "Alta";
				$this->class = "vermelho";
				break;
			break;
			
		}
		
		if($this->finalizado){
			$this->class = "verde";
		}
		
		parent::afterFind();
	}
}