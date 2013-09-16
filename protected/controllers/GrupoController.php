<?php

class GrupoController extends Controller
{
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
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	public function actionCreate()
	{
		$model=new Grupo;
		$model->atividade = new PermissaoAtividadeForm();
		$model->pessoa = new PermissaoPessoaForm();
		$model->projeto = new PermissaoProjetoForm();
		$model->gerencial = new PermissaoGerencialForm();
		$model->acervo = new PermissaoAcervoForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Grupo']))
		{
			
			$model->attributes=$_POST['Grupo'];
			
			$perm = array();
			if(isset($_POST['PermissaoAtividadeForm']))
				$perm['atividade'] = $_POST['PermissaoAtividadeForm'];
				
			if(isset($_POST['PermissaoAtividadeForm']))
				$perm['pessoa'] = $_POST['PermissaoPessoaForm'];
			
			if(isset($_POST['PermissaoProjetoForm']))
				$perm['projeto'] = $_POST['PermissaoProjetoForm'];
			
			if(isset($_POST['PermissaoAcervoForm']))
				$perm['acervo'] = $_POST['PermissaoAcervoForm'];
			
			if(isset($_POST['PermissaoGerencialForm']))
				$perm['gerencial'] = $_POST['PermissaoGerencialForm'];
				
			$model->permissao = json_encode($perm);
			
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_grupo));
			
			
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
		
		$permissoes = json_decode($model->permissao);
		$model->atividade = PermissaoAtividadeForm::load($permissoes->atividade);
		$model->pessoa = PermissaoPessoaForm::load($permissoes->pessoa);
		$model->projeto = PermissaoProjetoForm::load($permissoes->projeto);
		$model->gerencial = PermissaoGerencialForm::load($permissoes->gerencial);
		$model->acervo = PermissaoAcervoForm::load($permissoes->acervo);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Grupo']))
		{
			$model->attributes=$_POST['Grupo'];
			
			$perm = array();
			if(isset($_POST['PermissaoAtividadeForm']))
				$perm['atividade'] = $_POST['PermissaoAtividadeForm'];
			
			if(isset($_POST['PermissaoAtividadeForm']))
				$perm['pessoa'] = $_POST['PermissaoPessoaForm'];
				
			if(isset($_POST['PermissaoProjetoForm']))
				$perm['projeto'] = $_POST['PermissaoProjetoForm'];
				
			if(isset($_POST['PermissaoAcervoForm']))
				$perm['acervo'] = $_POST['PermissaoAcervoForm'];
				
			if(isset($_POST['PermissaoGerencialForm']))
				$perm['gerencial'] = $_POST['PermissaoGerencialForm'];
			
			$model->permissao = json_encode($perm);
				
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_grupo));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Grupo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Grupo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Grupo']))
			$model->attributes=$_GET['Grupo'];

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
		$model=Grupo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='grupo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
