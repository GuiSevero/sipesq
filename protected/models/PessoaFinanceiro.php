<?php

/**
 * This is the model class for table "pessoa_financeiro".
 *
 * The followings are the available columns in table 'pessoa_financeiro':
 * @property integer $cod_financeiro
 * @property integer $cod_pessoa
 * @property string $data_inicio
 * @property string $data_fim
 * @property string $data_relatorio
 * @property string $categoria
 * @property integer $cod_fonte_pagadora
 * @property integer $cod_categoria
 * @property integer $projeto_vinculado
 * @property double $valor
 *
 * The followings are the available model relations:
 * @property Projeto $projeto
 * @property Pessoa $pessoa
 * @property FinanceiroCategoria $categoria
 * @property FontePagadora $fontePagadora
 */
class PessoaFinanceiro extends CActiveRecord
{
	public $valor_total;
	public $vigencia;
	public $valor_recebido;
	public $meses_trabalhados;
	public $status = "";
	public $class = "label-info";
	public $percentagem_recebida;
	public $resumo='teste';
	public $nome_projeto;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PessoaFinanceiro the static model class
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
		return 'pessoa_financeiro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_pessoa, data_inicio, data_fim, categoria', 'required'),
			array('cod_pessoa, cod_fonte_pagadora, projeto_vinculado', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('data_relatorio, categoria', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_financeiro, cod_pessoa, data_inicio, data_fim, data_relatorio, cod_fonte_pagadora, categoria, projeto_vinculado, valor', 'safe', 'on'=>'search'),
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
			//'projetos' => array(self::MANY_MANY, 'Projeto', 'projeto_pessoa_financeiro(cod_financeiro, cod_projeto)'),
			'pessoa' => array(self::BELONGS_TO, 'Pessoa', 'cod_pessoa', 'order'=>'pessoa.nome ASC'),
			'projeto' => array(self::BELONGS_TO, 'Projeto', 'projeto_vinculado'),
			'fontePagadora' => array(self::BELONGS_TO, 'FontePagadora', 'cod_fonte_pagadora'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_financeiro' => 'Código',
			'cod_pessoa' => 'Pessoa',
			'data_inicio' => 'Data de Início',
			'data_fim' => 'Data de Término',
			'data_relatorio' => 'Data de Entrega do Relatório',
			'cod_fonte_pagadora' => 'Fonte Pagadora',
			'projeto_vinculado' => 'Projeto Vinculado',
			'valor' => 'Valor',
			'categoria'=>'Categoria',
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
		
		$criteria->with = array('pessoa');

		$criteria->compare('cod_financeiro',$this->cod_financeiro);
		$criteria->compare('cod_pessoa',$this->cod_pessoa);
		$criteria->compare('data_inicio',$this->data_inicio,true);
		$criteria->compare('data_fim',$this->data_fim,true);
		$criteria->compare('data_relatorio',$this->data_relatorio,true);
		$criteria->compare('cod_fonte_pagadora',$this->cod_fonte_pagadora);
		$criteria->compare('cod_categoria',$this->cod_categoria);
		$criteria->compare('projeto_vinculado',$this->projeto_vinculado);
		$criteria->compare('valor',$this->valor);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function afterFind(){

		//Pega o nome do projeto via SQL para evitar looping infinito na relação recíproca das tabelas de projeto e pessoaFinanceiro
		$projeto = Yii::app()->db->createCommand()
        ->select('nome')
        ->from('projeto')
        ->where('cod_projeto = :cod_projeto', array(':cod_projeto' => $this->projeto_vinculado))
        ->queryAll();
        $this->nome_projeto = $projeto[0]["nome"];
		
		//Calcula vigencia
		$this->calculaVigencia();
		//calcula os meses já trabalhados
		$this->calculaMesesTrabalhados();
		
		
		//Calcula os valores a receber e recebidos
		$this->valor_recebido = $this->meses_trabalhados * $this->valor;
		$this->valor_total = $this->valor * $this->vigencia;

		//Calcula a porcentagem já recebida
		$this->calculaPercentagemRecebida();
		
		$this->resumo = $this->categoria ." ("  .$this->status .")" .' - ' .$this->fontePagadora->nome .' - ' .$this->nome_projeto;
		
		//Define a classe
		$this->defineClass();
		
	    parent::afterFind();
	    
	}
	
	protected function afterSave(){
		//$this->atividadeSecundaria();
		parent::afterSave();
		return true;
		
	}
	
	/**
	 * Após o cadastramento de um recebimento, este método cadastra as 
	 * atividades secundárias (Autmaticamente geradas) vinculadas a ação de 
	 * cadastrar um recebimento. Este método deve ser executado dentro do méotodo afterSave()
	 */
	private function atividadeSecundaria(){
		
		$atividadesSecundarias = AtividadeSecundaria::model()->findAll(array('condition'=>"id = 'ATV_PESSOAFINANCEIRO'"));
		foreach($atividadesSecundarias as $atvSec){
			$atv = new Atividade();
			$atv->cod_pessoa = $this->cod_pessoa;
			
				$search = array("{ATUANTE}", "{PROJETO}");
				$replace = array($this->pessoa->nome, $this->nome_projeto);
				
				$atv->descricao = str_replace($search, $replace, $atvSec->descricao);
				$atv->nome_atividade = str_replace($search, $replace, $atvSec->titulo);;
			
				
			if($atvSec->tipo == "ONCREATE"){
				$atv->data_inicio = $this->data_inicio;
				$dataFim = explode("/", $this->data_inicio);
				$mes = $dataFim[1]+ $atvSec->prazo;
				$atv->data_fim = date("d/m/Y",mktime (0, 0, 0,  $mes, $dataFim[0], $dataFim[2]));
			}
				
			if($atvSec->tipo == "ONFINISH"){
				$atv->data_fim = $this->data_fim;
				$dataInicio = explode("/", $this->data_fim);
				$atv->data_inicio = $this->data_inicio;
				$mes = $dataInicio[1] - $atvSec->prazo;
				$atv->data_fim = date("d/m/Y",mktime (0, 0, 0,  $mes, $dataInicio[0], $dataInicio[2]));
			}			
			
			$atv->turnos_trabalho = 5;
			$atv->save();
			unset($atv);
		}
	}
	
	
	/**
	 * Calcula o período de vigência de um recebimento
	 */
	private function calculaVigencia(){
		
		$dataFimAno = date("Y",strtotime ($this->data_fim));
		$dataFimMes = date("m",strtotime ($this->data_fim));
		$dataFimDia = date("d", strtotime($this->data_fim));
		
		$dataInicioAno = date("Y",strtotime ($this->data_inicio));
		$dataInicioMes = date("m",strtotime ($this->data_inicio));
		$dataInicioDia = date("d", strtotime($this->data_inicio));
		
		//Calcula os meses de vigencia da bolsa
		$this->vigencia = (($dataFimMes - $dataInicioMes ) +  (($dataFimAno - $dataInicioAno)*12));

		//	Se trabalhou mais que 25 dias contamos como um mês.
		if( ($dataFimDia - $dataInicioDia)/20 >= 1){
			$this->vigencia++;
		}
		
		if($this->vigencia == 0)
		 $this->vigencia = 1;
		
	}
	private function calculaPercentagemRecebida(){
		if($this->valor_total > 0)
			$this->percentagem_recebida = ($this->valor_recebido / $this->valor_total)*100;
		else $this->percentagem_recebida = 0;
	}
	/**
	 * 
	 * Enter description here ...
	 */
	private function calculaMesesTrabalhados(){
		
		
		if(strtotime(date("Y-m-d")) < strtotime($this->data_fim)){
			//ainda não completou todos os meses.
			$dataFimAno = date("Y");
			$dataFimMes = date("m");
			$dataFimDia = date("d");
			$this->status = "aberta";
			$this->class = "label-info";
		}else{
				//Já trabalhou todos os meses.
				$dataFimAno = date("Y",strtotime ($this->data_fim));
				$dataFimMes = date("m",strtotime ($this->data_fim));
				$dataFimDia = date("d", strtotime($this->data_fim));
				$this->status = "fechada";
				$this->class = "label-success";
		}
		
		$dataInicioAno = date("Y",strtotime ($this->data_inicio));
		$dataInicioMes = date("m",strtotime ($this->data_inicio));
		$dataInicioDia = date("d", strtotime($this->data_inicio));
		

		//Verifica se falta 2 meses para a bolsa acabar
		
	
		
		//Calcula os meses de vigencia da bolsa
		$this->meses_trabalhados = (($dataFimMes - $dataInicioMes ) +  (($dataFimAno - $dataInicioAno)*12));
		
		//Se trabalhou mais que 25 dias contamos como um mês.
		if( ($dataFimDia - $dataInicioDia)/20 >= 1){
			$this->meses_trabalhados++;
		}
		
		if($this->meses_trabalhados == 0)
		 $this->meses_trabalhados = 1;
	}
	
/**
	 * 
	 * Retorna as bolsas que acabam em 6 meses 
	 */
	public static function getLasts(){
		$criteria=new CDbCriteria;
		$dataLimite =  date("d/m/Y", mktime(0, 0, 0, date("m") + 6, date("d"), date("Y")));
		$dataAtual = date("d/m/Y");
		$criteria->addCondition("t.data_fim <= '$dataLimite'", 'AND');
		$criteria->addCondition("t.data_fim >= '$dataAtual'", 'AND');
		$criteria->order = 't.data_fim DESC';
		return PessoaFinanceiro::model()->findALL($criteria);
	}
	
	/**
	 * 
	  * Define a classe da bolsa
	 * Verde: A bolsa está finalizada
	 * Amarelo: A bolsa está em andamento
	 * Vermelho: A bolsa está acabando	
	 * @param int $gap
	 */
	private function defineClass($gap=1){
	
		if(strtotime(date("Y-m-d")) < strtotime($this->data_fim)){
			$this->status = "aberta";
			$this->class = "label-info";
		}else{
				$this->status = "fechada";
				$this->class = "label-success";
		}
		
		
		//Verifica se o projeto está acabando
		if(date('Y') - date('Y', strtotime($this->data_fim)) == 0)
			if(date('m', strtotime($this->data_fim)) - date('m') <= $gap){
				$this->class = 'label-important';
			}
		
	}
	
}