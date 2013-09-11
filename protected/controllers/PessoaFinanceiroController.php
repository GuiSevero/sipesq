<?php

class PessoaFinanceiroController extends Controller
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
		/*
			array('deny',  // allow all users to perform 'index' and 'view' actions
				//'actions'=>array('index','view'),
				'users'=>array('*'),
			), */
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','view'),
				'users'=>array('@'),
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view','create','update'),
				'expression'=>function(){
					return Sipesq::isSupport();
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
	public function actionView($id, $no_layout=false)
	{
		if($no_layout)
			$this->layout=false;
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'no_layout'=>$no_layout,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($projeto=null)
	{
		$model=new PessoaFinanceiro;
		$model->data_inicio = date("d/m/Y");
		$model->data_fim = date("d/m/Y");
		$model->data_relatorio = date("d/m/Y");
		if($projeto != null)
			$model->projeto_vinculado = $projeto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PessoaFinanceiro']))
		{
			$model->attributes=$_POST['PessoaFinanceiro'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_financeiro));
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

		if(isset($_POST['PessoaFinanceiro']))
		{
			$model->attributes=$_POST['PessoaFinanceiro'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_financeiro));
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
		$dataProvider=new CActiveDataProvider('PessoaFinanceiro',array(
			                'criteria' => array(
			                 'with' => array('projeto','pessoa', 'fontePagadora'),
			                'together'=>true,
			               // 'condition'=>'pessoa.cod_pessoa = t.cod_pessoa AND projetos.cod_projeto = t.projeto_vinculado AND categoria.cod_categoria = t.cod_categoria AND fonte_pagadora.cod_fonte_pagadora = t.cod_fonte_pagadora',
							'order'=>'pessoa.nome',
			   				)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PessoaFinanceiro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PessoaFinanceiro']))
			$model->attributes=$_GET['PessoaFinanceiro'];

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
		$model=PessoaFinanceiro::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pessoa-financeiro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
