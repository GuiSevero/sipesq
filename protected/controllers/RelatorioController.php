<?php

class RelatorioController extends Controller
{
	
		public $layout='//layouts/column_new';
		protected $idMenu = 'menuRelatorio';
	
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('atividade','projeto','index','pessoas'),
				'expression'=>function(){
					return Sipesq::isSupport();
				}
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * 
	 * Renderiza o relatÃ³rio de atividades
	 * @param date $inicio - Data de inÃ­cio da atividade
	 * @param date $termino - Data de tÃ©rmino da atividade
	 */
	public function actionAtividade($inicio=null, $termino=null, $categoria=null, $projeto=null, $finalizado=false){
		
		$criteria =new CDbCriteria;
		$criteria->with = array('categoria','projetos'=>array('together'=>true));
		
		if($inicio != null){
			$criteria->addCondition("t.data_inicio >= '$inicio'", 'AND');
		}
		
		if($termino != null){
			$criteria->addCondition("t.data_fim <= '$termino'", 'AND');
		}
		
		if($categoria != null){
			$criteria->compare('categoria.cod_categoria_pai',$categoria);
		}
		
		if($finalizado)
		 	$criteria->addCondition('t.estagio=true', 'AND');
		
		if($projeto != null){
			$criteria->compare('projetos.cod_projeto', $projeto);
		}
		
		 
		$dataProvider=new CActiveDataProvider('Atividade', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>999,),))	;
		$this->render('atividade',array(
			'dataProvider'=>$dataProvider,
			'projeto'=>$projeto,
			'categoria'=>$categoria,
			'inicio'=>$inicio,
			'termino'=>$termino,
			'finalizado'=>$finalizado,
		));
		
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param date $inicio - Projetos que iniciam a partir desta data.
	 * @param date $termino - Projetos que terminam atÃ© esta data.
	 * @param integer $projeto
	 */
	
	public function actionProjeto($inicio=null, $termino=null,  $projeto=null, $relatorio=false){
		
		$criteria =new CDbCriteria;
		
		if($relatorio){
			$this->layout = '//layouts/relatorio';
		}
		
		if($inicio != null){
			$criteria->addCondition("t.data_inicio >= '$inicio'", 'AND');
		}
		
		if($termino != null){
			$criteria->addCondition("t.data_fim <= '$termino'", 'AND');
		}
		
		
		if($projeto != null){
			$criteria->addCondition("t.cod_projeto = '$projeto'", 'AND');
		}
		
		 
		$dataProvider=new CActiveDataProvider('Projeto', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>999,),))	;
		$this->render('projeto',array(
			'dataProvider'=>$dataProvider,
			'projeto'=>$projeto,
			'inicio'=>$inicio,
			'termino'=>$termino,
		));
		
	}
	
	/**
	 *
	 * Renderiza o relatÃ³rio de pessoas
	 * @param date $inicio - Data de inÃ­cio das atividades a serem mostradas no relatÃ³rio
	 * @param date $termino - Data de tÃ©rmino da atividade a serem mostradas no relatÃ³rio
	 */
	public function actionPessoas($idPessoa = null, $pessoais=true, $bancarias=true, $projetos=true, $bolsas=true, $atividadesParticipa=true, $atividadesParticipaFinalizadas=true, $atividadesParticipaPassos=true, $atividadesResponsavel=true, $atividadesResponsavelFinalizadas=true, $atividadesResponsavelPassos=true, $inicio=null, $termino=null){

		if($idPessoa != null)
			$dataPessoas = array("pessoa" => Pessoa::model()->findByPk($idPessoa));
		else {
			$dataPessoas = Pessoa::model()->findAll(array('order'=>'nome'));
		}

		$this->render('pessoas',array(
				'pessoas'=>$dataPessoas, 
				'idPessoa'=>$idPessoa,
				'pessoais'=>$pessoais,
				'bancarias'=>$bancarias,
				'projetos'=>$projetos,
				'bolsas'=>$bolsas,
				'atividadesParticipa'=>$atividadesParticipa,
				'atividadesParticipaFinalizadas'=>$atividadesParticipaFinalizadas,
				'atividadesParticipaPassos'=>$atividadesParticipaPassos,
				'atividadesResponsavel'=>$atividadesResponsavel,
				'atividadesResponsavelFinalizadas'=>$atividadesResponsavelFinalizadas,
				'atividadesResponsavelPassos'=>$atividadesResponsavelPassos,
				'inicio'=>$inicio,
				'termino'=>$termino,
		));
	
	}
}