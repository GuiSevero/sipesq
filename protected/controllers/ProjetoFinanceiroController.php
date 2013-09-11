<?php

class ProjetoFinanceiroController extends Controller
{
	protected $idMenu = 'menuGerencial';
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'create', 'index', 'addRubrica'),
				'expression'=>function(){
			
					if(isset($_GET['id'])){
						$id = $_GET['id'];
					}else{
						return Sipesq::isSupport();
					}
					
					$projeto = Projeto::model()->findByPk($id);
					return ($projeto != null) ?  $projeto->isSupport() : false;
				}
			),
			
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete', 'update', 'view'),
				'expression'=>function(){
			
					if(isset($_GET['id'])){
						$id = $_GET['id'];
					}else{
						return Sipesq::isSupport();
					}
					
					$model = ProjetoFinanceiro::model()->findByPk($id);
					return ($model != null) ?  $model->projeto->isSupport() : false;
				}
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=null)
	{
		$model=new ProjetoFinanceiro;
		//@var Projeto projeto
		$projeto = Projeto::model()->findByPk($id);
		
		if($projeto == null){
			//Projeto inexistente
			throw new CHttpException('404');
		}
		
		$model->cod_projeto = $id;
		$model->projeto = $projeto;
		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProjetoFinanceiro']))
		{
			$model->attributes=$_POST['ProjetoFinanceiro'];
			if($model->save()){
				//salva se há arquivo
				$this->saveFile($model);
				$this->redirect(array('projeto/view','id'=>$model->cod_projeto));
			
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProjetoFinanceiro']))
		{
			$model->attributes=$_POST['ProjetoFinanceiro'];
			if($model->save()){
				//salva se há arquivo
				$this->saveFile($model);
				$this->redirect(array('projeto/view','id'=>$model->cod_projeto));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProjetoFinanceiro');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id=null)
	{	
		$model=new ProjetoFinanceiro('search');
		
		$model->unsetAttributes();  // clear any default values
		
		if($id != null)
			$model->cod_projeto = $id;
		
		if(isset($_GET['ProjetoFinanceiro']))
			$model->attributes=$_GET['ProjetoFinanceiro'];

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
		$model=ProjetoFinanceiro::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='projeto-financeiro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Cria uma rubrica via ajax
	 */
	public function actionAddRubrica(){
		
		$model=new ProjetoRubrica();
		
		if(isset($_POST['ProjetoRubrica']))
		{
			$model->attributes=$_POST['ProjetoRubrica'];
			if($model->save()){
				//salva se há arquivo
				echo "<option value=" .$model->cod_rubrica .">" .$model->nome ."</option>";			
			}else{
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			}
			 
				
		}else{
			$this->renderPartial('_rubrica', array('model'=>$model));	
		}
		
	}
	
	
	/**
	 * 
	 * Salva o arquivo de publicacao do modelo
	 * @param Publicacao $model
	 */
	protected function saveFile(ProjetoFinanceiro $model){
					
		
					//Caminho base para os arquivos
					$dir = Yii::getPathOfAlias('webroot.files');
					
					//Pega arquivo de upload
					$file = CUploadedFile::getInstance($model,'file');
					
					//Verifica se tem arquivo
				if($file != NULL){
						
						//Salva a url da imagem
						$fileName =  $model->categoria->nome .'_' .$model->cod_projeto .$model->cod_projeto_financeiro .'.' .$file->getExtensionName();
						
						//Caminho para salvar o arquivo
						$fileDestino = $dir .DIRECTORY_SEPARATOR .$fileName;
						
						//Salva arquivo de imagem
						$file->saveAs($fileDestino);
						
						//Atualiza o link para o arquivo
						$model->arquivo = Yii::app()->request->baseUrl .'/files/' .$fileName; 
						
						//Salva modelo novamente para gravar o link href do arquivo
						$model->save();
					} 
	}
}
