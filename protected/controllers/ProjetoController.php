<?php

class ProjetoController extends Controller
{
	protected $idMenu = 'menuGerencial';
	public $activeMenu = "Projetos";
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column_new';

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
				
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('json'),
					'users'=>array('*') ,
			),
				
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','index', 'ativos', 'finalizados', 'grantt', 'oldGrantt'),
				'users'=>array('@') ,//array('grsevero'),
			), 
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('docs', 'info', 'atividades', 'financeiro', 'view', 'tabAtividades',  'jsonFinanceiro', 'chartRows', 'setupDespesas','updateFile', 'createFile', 'deleteFile','calendar', 'renderChart'),
				'expression'=> function(){
			
							//	Se for admin já retorna permissão de acesso
							if(Sipesq::isAdmin() || Sipesq::isSupport())
								return true;
							
							//o usuário não é permitido
							return false;				
				},
				
				
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('atividades'),
					'expression'=> function(){
						return (Sipesq::isAdmin() || Sipesq::getPermition('projetos.informacoes' >= 1));
					},
						
						
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('info', 'view'),
					'expression'=> function(){
						return (Sipesq::isAdmin() || Sipesq::getPermition('projetos.informacoes' >= 1));
					},
			
			
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'expression'=> function(){
						
							//Se for admin já retorna permissão de acesso
							if(Sipesq::isAdmin() || Sipesq::getPermition('projetos.informacoes' >= 2))
								return true;
			
							//verifica se o usuario é um dos coordenadores
							//if(Projeto::model()->count('cod_projeto = :proj AND (cod_professor = :id OR cod_grad = :id OR cod_pos_grad = :id)', array('id'=>$pessoa, 'proj'=>$projeto)) > 0) return true;
							//verifica se o usuário está inscrito em uma permissão maiour ou igual a de SUPORTE.	
							//if(PermissaoProjeto::model()->count('cod_projeto = :projeto AND cod_pessoa = :id AND nivel_permissao >= :nivel', array('id'=>$pessoa, 'projeto'=>$projeto, 'nivel'=>Sipesq::SUPPORT_PERMITION)) > 0) return true;
								
							//Usuario negado
							return false;				
				},
				
				
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('permissoes', 'deletePermissao', 'gerencial'),
				'expression'=> function(){
							//Se for admin já retorna permissão de acesso
							if(Sipesq::isAdmin() ||Sipesq::getPermition('projetos.gerencial') >= 100) return true;
							return false;
				},
			
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('tabFinanceiro','relatorio'),
					'expression'=> function(){
						//Se for admin já retorna permissão de acesso
						if(Sipesq::isAdmin() || Sipesq::getPermition('projetos.financeiro') >= 1)
							return true;
						
						return false;
					},
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'delete'),
				'expression'=> function(){
						return Sipesq::isAdmin() || (Sipesq::getPermition('projetos.deletar') >= 100);			
				},
			
			),
			array('deny',  // deny all users
				'users'=>array('*'),
				'message'=>'Você não tem permissão para realizar esta operação. Entre em contato com o coordenador do projeto',
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		return $this->actionInfo($id);
		/*
		$model = Projeto::model()->findByPk($id);
		
		$this->render('view',array(
			'model'=>$model,
		));*/
	}

	/**
	*	Carrega a aba de atividades por AJAX
	*	@param int $id - identificador do projeto
	*   
	*/
	public function actionTabAtividades($id){			
		
			$model = Projeto::model()->findByPk($id);
			
			/*
			//Verifica a permissão dos usuários.
			if(!in_array(Yii::app()->user->name, array_merge($model->loginsPermitidos(PermissaoProjeto::READ_PERMITION) , Yii::app()->params['admins'])))
				throw new CHttpException(401,'Acesso Negado. Você não está permitido a fazer esta operação.');
			*/
			
			//Enontra todas as atividades deste projeto
			$atividades = Atividade::model()->with('projetos')->findAll(array('condition'=>'projetos.cod_projeto = ' .$id, 'order'=>' t.data_fim desc, status asc'));
			
			$this->renderPartial('/atividade/_accordion_view', array('atividades'=>$atividades));
			/*
			//renderiza na tela as atividades
			foreach ($atividades as $key => $atv) {
				$this->renderPartial('/atividade/_view', array('data'=>$atv));
			}
			*/			
			Yii::app()->end();		
			
	}


	/**
	*	Carrega a aba financeira por AJAX
	*	@param int $id - identificador do projeto
	*   
	*/
	public function actionTabFinanceiro($id){

			$model = Projeto::model()->findByPk($id);
			
			$this->layout = false;

			//$this->renderPartial("_view_financeiro_new", array("model"=>$model));
			
			Yii::app()->end();		
	}

public function actionRenderChart(){
	
	Yii::setPathOfAlias('gchart',Yii::getPathOfAlias('application.vendors.gchart'));
	
	$lineChart = new gchart\gLineChart(200,200);
	$lineChart->addDataSet(array(120,131,135,160,129,22,190));
	$lineChart->setLegend(array('Nice figures'));
	$lineChart->setColors(array('ED237A'));
	$lineChart->setVisibleAxes(array('x','y'));
	$lineChart->setDataRange(0,200);
	$lineChart->setLegendPosition('t');
	// axisnr, from, to, step
	$lineChart->addAxisRange(0,0,28,7);
	$lineChart->addAxisRange(1,0,200);
	
	$lineChart->setGridLines(25,10);
	$lineChart->renderImage(true);
	//$lineChart->renderImage(false)
}
	
/**
 * 
 * Relatório de projeto
 * @param integer $id
 */
	
public function actionRelatorio($id)
	{
		
		
		$model = Projeto::model()->findByPk($id);
		
		if( $model == null ) throw new CHttpException(404);	
		
		$this->layout = "//layouts/relatorio";
		
		$this->render('relatorio/relatorio',array('model'=>$model));

		/*
		# mPDF
		$mPDF1 = Yii::app()->ePdf->mpdf();
		
		# You can easily override default constructor's params
		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
		
				# render (full page)
		$content = $this->render('relatorio/relatorio',array('model'=>$model), true);
		$mPDF1->WriteHTML($content);
		
				# Load a stylesheet
				$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap/bootstrap.min.css');
				$mPDF1->WriteHTML($stylesheet, 1);
		
		$mPDF1->Output();
		
		*/
		
		//Yii::app()->end();
		
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Projeto;
		/*
		$model->data_inicio = date("d/m/Y");
		$model->data_fim = date("d/m/Y");
		$model->data_relatorio = date("d/m/Y");
		*/
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['Projeto']))
		{
			$model->attributes=$_POST['Projeto'];
			
			if(isset($_POST['Projeto']['pessoas_atuantes'])){
				$model->pessoas_atuantes = $_POST['Projeto']['pessoas_atuantes'];
			}
			
			
			if(isset($_POST['Orcamento'])){
				$model->orcamentos = $_POST['Orcamento'];
				
			} 
			
			if($model->save()){
				//Cria permissão para o coordenador
				
				if(!$this->salvaOrcamento($model->cod_projeto, $model->orcamentos))
					throw new CHttpException(500, "ERRO AO ADICIONAR ORCAMENTOS");
				
				$this->createDafaultPermissions($model);
				$this->salvaPessoas($model->cod_projeto, $model->pessoas_atuantes);
				
				
				$this->redirect(array('view','id'=>$model->cod_projeto));
				
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		if(isset($_POST['Projeto']))
		{
			
			if(isset($_POST['Projeto']['pessoas_atuantes'])){
				$model->pessoas_atuantes = $_POST['Projeto']['pessoas_atuantes'];
			}
			
			
			$orcamentos = null;
			if(isset($_POST['Orcamento'])){
				$orcamentos = $_POST['Orcamento'];
			
			}
			
			//Retira a permisssão do coordenador antigo
			$this->deleteDafaultPermissions($model);
				
			$model->attributes=$_POST['Projeto'];
			if($model->save()){
				
				if(!$this->salvaOrcamento($model->cod_projeto, $orcamentos))
					throw new CHttpException(500, "ERRO AO ADICIONAR ORCAMENTOS");
				
				//Atualiza permissão do coordenador
				$this->createDafaultPermissions($model);
				$this->salvaPessoas($model->cod_projeto, $model->pessoas_atuantes);
				$this->redirect(array('view','id'=>$model->cod_projeto));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//Deleta apenas se for um request do tipo POST
		if(Yii::app()->request->isPostRequest)
		{
		
			$model = $this->loadModel($id);
			
			 //	Deleta o projeto
			 $model->delete();
				
				
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($situacao=0)
	{	$criteria = new CDbCriteria();
	
		//Se o usuário não for admin ou do suporte só mostra os seus próprios projetos
		if(Pessoa::getAccessLevel(Yii::app()->user->getId()) < Sipesq::SUPPORT_PERMITION){
			$criteria->with = array('pessoas_atuantes');
			$criteria->together = true;
			$criteria->addCondition(
				'pessoas_atuantes.cod_pessoa = :cod_pessoa
				 OR t.cod_pos_grad = :cod_pessoa
				 OR t.cod_grad = :cod_pessoa
				 OR t.cod_professor = :cod_pessoa', 'AND');
			$criteria->params = array('cod_pessoa'=>Yii::app()->user->getId());
		}	
		
		$criteria->compare('situacao', $situacao);
		
		$dataProvider=new CActiveDataProvider('Projeto',array('criteria'=>$criteria));
			   				
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'situacao'=>$situacao
		));
	}
	
	/**
	 * Mostra todos os projetos finalizados 
	 */
	public function actionFinalizados()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 't.nome';
		$criteria->with = 'pessoas_atuantes';
		$criteria->together = true;
		$criteria->addCondition('finalizado = true', 'AND');
		
		
		//Verifica se tem permissão para ver todos os projetos
		if(Pessoa::getAccessLevel(Yii::app()->user->getId()) < Sipesq::SUPPORT_PERMITION){
			$criteria->addCondition(
				'pessoas_atuantes.cod_pessoa = :cod_pessoa
				 OR t.cod_pos_grad = :cod_pessoa
				 OR t.cod_grad = :cod_pessoa
				 OR t.cod_professor = :cod_pessoa', 'AND');
			$criteria->params = array('cod_pessoa'=>Yii::app()->user->getId());
		}
		
		$dataProvider=new CActiveDataProvider('Projeto', array('criteria'=>$criteria));
			   				
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Mostra todos os projetos ativos
	 */
	
	public function actionAtivos()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 't.nome';
		$criteria->with = 'pessoas_atuantes';
		$criteria->together = true;
		$criteria->addCondition('finalizado = false', 'AND');
		
		
		//Verifica se tem permissão para ver todos os projetos
		if(Pessoa::getAccessLevel(Yii::app()->user->getId()) < Sipesq::SUPPORT_PERMITION){
			$criteria->addCondition(
				'pessoas_atuantes.cod_pessoa = :cod_pessoa
				 OR t.cod_pos_grad = :cod_pessoa
				 OR t.cod_grad = :cod_pessoa
				 OR t.cod_professor = :cod_pessoa', 'AND');
			$criteria->params = array('cod_pessoa'=>Yii::app()->user->getId());
		}
		
		$dataProvider=new CActiveDataProvider('Projeto', array('criteria'=>$criteria));
			   				
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	/**
	 * Deleta as permissões padrão para Bolsista Responsável e Coordenador
	 * @param Projeto $projeto - projeto que será atualizado
	 */
	 private function deleteDafaultPermissions($projeto){
	 	
	 	//deleta a permissao do professor
	 	$coordenador = PermissaoProjeto::model()->find('cod_pessoa = :pessoa AND cod_projeto = :projeto', array('pessoa'=>$projeto->cod_professor, 'projeto'=>$projeto->cod_projeto));
	 	if($coordenador != null){
	 		$coordenador->delete();
	 		
	 	}
	 	
	 	//Deleta a permissao do pos-graduando
	 	$responsavel = PermissaoProjeto::model()->find('cod_pessoa = :pessoa AND cod_projeto = :projeto', array('pessoa'=>$projeto->cod_pos_grad, 'projeto'=>$projeto->cod_projeto));
	 	if($responsavel != null){
	 		$responsavel->delete();
	 	}
	 	
	 //Deleta a permissao do graduando
	 	$responsavel = PermissaoProjeto::model()->find('cod_pessoa = :pessoa AND cod_projeto = :projeto', array('pessoa'=>$projeto->cod_grad, 'projeto'=>$projeto->cod_projeto));
	 	if($responsavel != null){
	 		$responsavel->delete();
	 	}
	 	
	 }
	 
	/**	
	 * Cria as permissões padrão para Bolsista Responsável e Coordenador
	 * @param Projeto $projeto - projeto que será atualizado
	 * @return boolean - se todas as alterações foram efetivas
	 */
	 private function createDafaultPermissions($projeto){
	 	//Atualiza permissão do professor responsavel
		$permissao_professor = new PermissaoProjeto();
		$permissao_professor->cod_projeto = $projeto->cod_projeto;
		$permissao_professor->cod_pessoa = $projeto->cod_professor;
		$permissao_professor->nivel_permissao = PermissaoProjeto::READ_WRITE_DELETE_PERMITION;
		
		if(!$permissao_professor->save())
			return false;
		unset($permissao_professor);
		
		//Atualiza permissão do pos-graduando responsavel
		$permissao_pos_grad = new PermissaoProjeto();
		$permissao_pos_grad->cod_projeto = $projeto->cod_projeto;
		$permissao_pos_grad->cod_pessoa = $projeto->cod_pos_grad;
		$permissao_pos_grad->nivel_permissao = PermissaoProjeto::READ_WRITE_DELETE_PERMITION;
		
		if(!$permissao_pos_grad->save())
			return false;
		unset($permissao_pos_grad);
		
	 	//Atualiza permissão do graduando responsavel
		$permissao_grad = new PermissaoProjeto();
		$permissao_grad->cod_projeto = $projeto->cod_projeto;
		$permissao_grad->cod_pessoa = $projeto->cod_grad;
		$permissao_grad->nivel_permissao = PermissaoProjeto::READ_WRITE_PERMITION;
		
		if(!$permissao_grad->save())
			return false;
		unset($permissao_grad);
		
		//Tudo ocorreu bem
		return true;
		
	 }
	
	/**
	 * Gerencia as permissões dos usuários nos projetos
	 * @param integer $id - identificador do projeto
	 */
	public function actionPermissoes($id){
		
		$model = new PermissaoProjeto();
		$model->cod_projeto = $id;
		
		if(isset($_POST['PermissaoProjeto']))
		{
			$model->attributes=$_POST['PermissaoProjeto'];
			if($model->save())
				$this->redirect(array('permissoes', 'id'=>$id));
		}
		
		
			//Renderiza a página de permissões confome o projeto
			$projeto = Projeto::model()->findByPk($id);
	
			if($projeto == null){
				//Se não existe este projeto dispara erro			
				throw new CHttpException(404,'Página não encontrada.');
			}
			
			$data = PermissaoProjeto::model()->findAll(array('condition'=>"cod_projeto = " .$id));
			$this->render('_form_permissao', array('data'=>$data, 'projeto'=>$projeto, 'model'=>$model));	
		
	}
	
	
	/**
	 * 
	 * Deleta uma permissão
	 * @param integer $id
	 * @throws CHttpException
	 */
	public function actionDeletePermissao($id, $cod_pessoa)
	{
			$model = PermissaoProjeto::model()->find('cod_pessoa = :cod_pessoa AND cod_projeto = :cod_projeto', array('cod_projeto'=>$id, 'cod_pessoa'=>$cod_pessoa));
			$projeto = Projeto::model()->findByPk($id
			);
			
			 //	Deleta o projeto
			 $model->delete();
			$this->redirect(isset($_GET['returnUrl']) ? $_GET['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projeto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projeto']))
			$model->attributes=$_GET['Projeto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Projeto::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projeto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Salva todas as pessoas do projeto
	 * @param unknown $cod_projeto
	 * @param unknown $pessoas
	 */
	private function salvaPessoas($cod_projeto,$pessoas){
		ProjetoPessoaAtuante::model()->deleteAll('cod_projeto = '.$cod_projeto);
		foreach ($pessoas as $p){
			$a = new ProjetoPessoaAtuante();
			$a->cod_projeto = $cod_projeto;
			$a->cod_pessoa = $p;
			$a->save();
			unset($a);		
		}
	}
	
	
	/**
	 * Salva todas as pessoas do projeto
	 * @param integer $cod_projeto
	 * @param Array $rubricas - Array associativo array('valor'=>X,'cod_rubrica'=>Y)
	 * @return boolean - caso todas as alterações tenham sido efetivas. Util para fazer transactions
	 */
	private function salvaOrcamento($cod_projeto, $rubricas){
		
		$rows = ProjetoOrcamento::model()->deleteAll('cod_projeto = '.$cod_projeto);

		if($rubricas === null)
			return true;
		
		foreach($rubricas as $r){
			
			$orc = new ProjetoOrcamento();
			$orc->cod_rubrica = $r['cod_rubrica'];
			$orc->cod_projeto = $cod_projeto;
			$orc->valor = $r['valor'];

			//erro ao salvar - retorna false
			if(!$orc->save()){
				return false;
			}
			unset($orc);
		}
		
		return true;
	}
	
	
	
	/**
	 * Pega as informações do financeiro do projeto
	 */
	public function actionJsonFinanceiro($id){
		$model = Projeto::model()->findByPk($id);
		
		
		
		$json = array(
			'cols'=>array(
				array('label'=>'Origem', 'type'=>'String'),
				array('label'=>'Orcamentado', 'type'=>'number'),
				array('label'=>'Recebido', 'type'=>'number'),
				array('label'=>'Gasto', 'type'=>'number'),
				array('label'=>'Saldo', 'type'=>'number'),
			),
			
			'rows'=>array(
				array('c'=>array(array('v'=>'Bolsas', 'c'=>'Bolsas'), array('v'=>$model->verba_bolsa, 'c'=>$model->verba_bolsa), array('v'=>$model->recebido_bolsa, 'c'=>$model->recebido_bolsa), array('v'=>$model->gasto_bolsa, 'c'=>$model->gasto_bolsa), array('v'=>$model->recebido_bolsa - $model->gasto_bolsa, 'c'=>$model->recebido_bolsa - $model->gasto_bolsa))),
				array('c'=>array(array('v'=>'Custeio', 'c'=>'Custeio'), array('v'=>$model->verba_custeio, 'c'=>$model->verba_custeio), array('v'=>$model->recebido_custeio, 'c'=>$model->recebido_custeio), array('v'=>$model->gasto_custeio, 'c'=>$model->gasto_custeio), array('v'=>$model->recebido_custeio - $model->gasto_custeio, 'c'=>$model->recebido_custeio - $model->gasto_custeio))),
				array('c'=>array(array('v'=>'Capital', 'c'=>'Capital'), array('v'=>$model->verba_capital, 'c'=>$model->verba_capital), array('v'=>$model->recebido_capital, 'c'=>$model->recebido_capital), array('v'=>$model->gasto_capital, 'c'=>$model->gasto_capital), array('v'=>$model->recebido_capital - $model->gasto_capital, 'c'=>$model->recebido_capital - $model->gasto_capital))),
				array('c'=>array(array('v'=>'Outros', 'c'=>'Outros'), array('v'=>$model->verba_outros, 'c'=>$model->verba_outros), array('v'=>$model->verba_outros, 'c'=>$model->verba_outros), array('v'=>$model->gasto_outros, 'c'=>$model->gasto_outros), array('v'=>$model->verba_outros - $model->gasto_outros, 'c'=>$model->verba_outros - $model->gasto_outros))),
			),
		
		);
		
		echo json_encode($json);
		Yii::app()->end();
	}
	
	
	/**
	 * Imprime o grafico de grantt das atividades de um projeto
	 * @param $id - codigo do projeto
	 */
	public function actionGrantt($id)
	{

		$this->layout='//layouts/grantt';
		$model = Projeto::model()->findByPk($id);		
		$this->render('atividades', array('model'=>$model));
	}
	
/**
	 * Imprime o grafico de grantt das atividades de um projeto
	 * @param $id - codigo do projeto
	 */
	public function actionOldGrantt($id)
	{
		$this->layout='//layouts/column1';		
		$model = Projeto::model()->findByPk($id);
		$this->render('atividades', array('model'=>$model));
	}
	
	/**
	 * Adiciona um arquivo
	 * @param id - Identificador do projeto 
	 */
	public function actionCreateFile($id)
	{
		//Pasta onde as imagens serão salvas.
		$dir = Yii::getPathOfAlias('application.data.projetos');
		
	    $model=new ProjetoArquivo;
	    $model->cod_projeto = $id;
	    $model->file = '123';
	
	    // uncomment the following code to enable ajax-based validation
	  
	
	    if(isset($_POST['ProjetoArquivo']))
	    {
	    	$model->attributes=$_POST['ProjetoArquivo'];
	    	
	    	//Carrega o arquivo de documento.
			$model->file = CUploadedFile::getInstance($model,'file');
			if($model->validate()){
				$model->filename = $model->file->name;
				$model->extensionName = $model->file->extensionName;
				$model->size = $model->file->size;
				$model->type = $model->file->type;
				$model->file->saveAs($dir .DIRECTORY_SEPARATOR .$model->file->name);
				$model->href = Yii::app()->request->baseUrl .'/protected/data/projetos/' .$model->filename; 
				
				Yii::getPathOfAlias('webroot.protected.data.projetos') .DIRECTORY_SEPARATOR .$model->filename;
			}											
							
	    	
	        
	        if($model->save())
	        {
				$this->redirect(array('/projeto/docs', 'id'=>$id));	            
	        }
	    }
	    $this->render('_form_arquivo',array('model'=>$model, 'projeto'=>$this->loadModel($id)));
	}
	
/**
	 * Adiciona um arquivo
	 * @param id - Identificador do projeto 
	 */
	public function actionUpdateFile($id)
	{
		/** @var Projeto $model */
	    
	    $model = ProjetoArquivo::model()->findByPk($id);
	
	    if(isset($_POST['ProjetoArquivo']))
	    {
	        $model->attributes=$_POST['ProjetoArquivo'];
	        
	        $dir = Yii::getPathOfAlias('application.data.projetos');
	        
	        $model->file = CUploadedFile::getInstance($model,'file');
			if($model->file != null){
				
				if(file_exists($dir .DIRECTORY_SEPARATOR .$model->filename))
					unlink($dir .DIRECTORY_SEPARATOR .$model->filename);
				
				$model->filename = $model->file->name;
				$model->extensionName = $model->file->extensionName;
				$model->size = $model->file->size;
				$model->type = $model->file->type;
				$model->file->saveAs($dir .DIRECTORY_SEPARATOR .$model->file->name);
				$model->href = Yii::app()->request->baseUrl .'/protected/data/projetos/' .$model->filename; 
				
			}			
	        
	        
	        
	        if($model->save())
	        {
	            $this->redirect(array('/projeto/docs', 'id'=>$model->cod_projeto));
	        }
	    }
	    $this->render('_form_arquivo',array('model'=>$model, 'projeto'=>$this->loadModel($model->cod_projeto)));
	}
	
	/**
	 * Deleta um arquivo de um projeto
	 * @param integer $id - identificador do ProjetoArquivo
	 */
	public function actionDeleteFile($id){
		
		if(Yii::app()->request->isPostRequest)
		{
			$model = ProjetoArquivo::model()->findByPk($id);
			$projeto = $model->cod_projeto;
			
			
			$dir = Yii::getPathOfAlias('application.data.projetos');
			unlink($dir .DIRECTORY_SEPARATOR .$model->filename);
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/projeto/view', 'id'=>$projeto));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
	}
	
	
	/**
	 * Json
	 * @param integer  $id - rubrica
	 */
	public function actionChartRows($id){
		
		if(!isset($_GET['p'])){
			throw new CHttpException('404', "Rubrica invalida");
		}
		
		$p = $_GET['p'];

		$this->layout=false;
		header('Content-type: application/json');
		
		
		$rubrica = new Rubrica();
		$rubrica = Rubrica::model()->findByPk($id);
		
		
		if($rubrica == null){
			throw new CHttpException('404', "Rubrica inexistente");
		}
		
		echo  '[';
		echo "null," .$rubrica->calculaGastos($rubrica, $p) .",";
		echo  $rubrica->calculaReceitas($rubrica, $p);
		echo ']';
		
		Yii::app()->end();
		
	}
	
	/**
	 * @param $id - projeto vinculado
	 */
	public function actionGastosRubricaJson($id){
		$model = new Projeto();
		$model = $model->findByPk($id);
		if($model == null) throw new CHttpException(404);
		
	}
	
	/**
	 * Coloca cada despesa do projeto em um pote correspondente com a rubrica
	 * @param unknown $id
	 */
	public function actionSetupDespesas($id){
		$this->layout = false;
		
		$projeto = new Projeto();
		$projeto = Projeto::model()->findByPk($id);
		
		if($projeto == null)
			throw new CHttpException(404);
		
		foreach($projeto->despesas as $despesa){
			
			foreach($projeto->receitas as $rec){
				
				foreach($rec->rubricas as $rub){
					//Salva a rubrica na despesas
					$this->saveRubrica($rub, $despesa, $rec);
					
				}
			}
			
		}
		
	}
	
	private function saveRubrica($rubrica, $despesa, $receita){
		
		if($rubrica->cod_rubrica == $despesa->cod_rubrica){
			$despesa->cod_verba = $receita->cod_verba;
			$despesa->save();
			echo "<br>SALVANDO A DESPESA " . $despesa->cod_despesa . " no pote " .$receita->cod_verba .'<BR>';
			
		}elseif($rubrica->cod_rubrica_pai == $despesa->cod_rubrica){
			
			$despesa->cod_verba = $receita->cod_verba;
			$despesa->save();
			echo "<br>SALVANDO A DESPESA " . $despesa->cod_despesa . " no pote " .$receita->cod_verba .'<BR>';
			
			
		}else{
			foreach($rubrica->filhas as $r)
				$this->saveRubrica($r, $despesa, $receita); //Chama recursivamente as outras rubricas
		}
	}
	
	/**
	 * Renderiza o json para o calendario
	 */
	public function actionCalendar(){
	
		if(!isset($_GET['start']) || !isset($_GET['end'])){
			$start = date('Y-m-d');
			$end = date('Y-m-d');
		}
		else{
			$start = $_GET['start'];
			$end = $_GET['end'];
		}
	
		$command =  Yii::app()->db->createCommand()
		->select('nome, data_inicio, data_fim, cod_projeto')
		->from('projeto');
		
		//Limitar data_inicio
		$results = $command->queryAll();
	
		$map_inicio = function($atv){
			$result = array(
					'id'=> "" .$atv['cod_projeto']
					,'title'=>"Início do projeto: " .$atv['nome']
					,'url'=>"" .$this->createUrl('/projeto/view', array('id'=>$atv['cod_projeto']))
					,'class'=>'event-info'
					,'start'=>""  .strtotime($atv['data_inicio']) * 1000
					,'end'=>"" .strtotime($atv['data_inicio'])*1000 + 3600 // 1 hora depois
	
			);
				
			return $result;
		};
		
		$map_termino = function($atv){
			$result = array(
					'id'=> "" .$atv['cod_projeto']
					,'title'=>"Término do projeto: " .$atv['nome']
					,'url'=>"" .$this->createUrl('/projeto/view', array('id'=>$atv['cod_projeto']))
					,'class'=>'event-success'
					,'start'=>"".strtotime($atv['data_fim'])*1000
					,'end'=>"".strtotime($atv['data_fim'])*1000 + 3600
		
			);
		
			return $result;
		};
	
	
	
		$calendarData = array(
				'success'=>1,
				'result'=>array_merge(array_map($map_inicio, $results),array_map($map_termino, $results))
		);
	
		$this->layout=false;
		header('Content-type: application/json');
		echo json_encode($calendarData);
		Yii::app()->end();
	
	}
	
	
	public function actionJson(){
		

			$where = array();
			$command =  Yii::app()->db->createCommand();
			
			$select = array(
					'cod_projeto as id'
					,	'nome'
					,	'data_inicio'
					,	'data_fim'
			);
			
			if(isset($_GET['q'])){
				$where[] = " nome ILIKE '%" .$_GET['q'] ."%' ";
			}
			
			//MONTA O SQL
			$command->from('projeto');
			$command->where = implode(' ', $where);
			$command->select = implode(', ', $select);
			$command->order = 'nome ASC';
			$command->limit(10);
			
			$results = $command->queryAll();
			
			$map = function($projeto){
				$result = array(
						'id'=> "" .$projeto['id']
						,'value'=>$projeto['nome']
						,'tokens'=>explode(" ", $projeto['nome'])
						,'url'=>"" .Yii::app()->createUrl('/projeto/view', array('id'=>$projeto['id']))
				);
				return $result;
			};
			
			$projetos = array_map($map, $results);
			echo json_encode($projetos);
			Yii::app()->end();
			
	}
	
	
	
	/**
	 * Renderiza a página de informaçoes financeiras de um projeto
	 * @param integer $id
	 */
	public function actionFinanceiro($id){
		$model = $this->loadModel($id);
		$this->render('new_view', array(
				'model'=>$model
				,	'partialView'=>'_view_financeiro_new'
				,	'activeTab'=>'tab-financeiro'
		
		));
	}
	
	
	/**
	 * Renderia a página de informações de um projeto
	 * @param integer $id
	 */
	public function actionInfo($id){
		
		$model = $this->loadModel($id);
		$this->render('new_view', array(
					'model'=>$model
				,	'partialView'=>'_view_info'
				,	'activeTab'=>'tab-info'
				
		));
	}
	
	
	/**
	 * Renderia a pagina de atividades de um projeto
	 * @param integer $id
	 */
	public function actionAtividades($id){
		
		$model = $this->loadModel($id);
		$this->render('new_view', array(
				'model'=>$model
				,	'partialView'=>'_view_atividades'
				,	'activeTab'=>'tab-atividades'
		
		));
		
	}
	
	/**
	 * Renderiza a página de documentos de um projeto
	 * @param unknown $id
	 */
	public function actionDocs($id){
		
		$model = $this->loadModel($id);
		$this->render('new_view', array(
				'model'=>$model
				,	'partialView'=>'_view_documentos'
				,	'activeTab'=>'tab-docs'
		
		));
		
	}
	
	/**
	 * Renderiza a página de gerencia de projetos
	 * @param integer $id
	 */
	public function actionGerencial($id){
		/*
		$permissao = new PermissaoProjeto();
		$permissao->cod_projeto = $id;
		
		if(isset($_POST['PermissaoProjeto']))
		{
			$permissao->attributes=$_POST['PermissaoProjeto'];
			if($permissao->save())
				$this->redirect(array('/projeto/gerencial', 'id'=>$id));
		} */
		
		$model = $this->loadModel($id);
		$this->render('new_view', array(
					'model'=>$model
				,	'partialView'=>'_view_gerencial'
				,	'activeTab'=>'tab-gerencial'
			
		));
		
	}
	
}
