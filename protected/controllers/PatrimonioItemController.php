<?php

class PatrimonioItemController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','search', 'create','update','delete'),
				'expression'=>function(){
			
					//Pega o id do Termo de Patrimônio
					if(isset($_GET['id'])){
						$id = $_GET['id'];	
					}else{
						//Erro - não dá permissão
						return false;
					}
					
					$model = PatrimonioItem::model()->findByPk($id);
					if($model != null){
						//Retorna se o usuário tem permissão para isto
						return $model->termo->projeto->isSupport(Yii::app()->user->getId());
					}
					
					//Usuário não é permitido
					return false;
				}
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'expression'=>function(){
					return Sipesq::isAdmin();
				}
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
	public function actionCreate($id)
	{
		
		$model=new PatrimonioItem();
		$model->cod_termo = $id;
		$model->termo = PatrimonioTermo::model()->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PatrimonioItem']))
		{
			$model->attributes=$_POST['PatrimonioItem'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_item));
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

		if(isset($_POST['PatrimonioItem']))
		{
			$model->attributes=$_POST['PatrimonioItem'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_item));
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
		$dataProvider=new CActiveDataProvider('PatrimonioItem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		'model'=>new PatrimonioItem(),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id=null)
	{
		$model=new PatrimonioItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PatrimonioItem']))
			$model->attributes=$_GET['PatrimonioItem'];
		
		if($id != null)
		 $model->cod_termo = $id;
			

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
		$model=PatrimonioItem::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='patrimonio-item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
public function actionSearch($q=null)
	{	
		$model=new PatrimonioItem();
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PatrimonioItem']))
		  $model->attributes=$_GET['PatrimonioItem'];
		  
		if($q != null){
				$model->nro_patrimonio = $q;
		}
		
		$criteria=new CDbCriteria;
		$criteria->compare('t.nro_patrimonio', (int)$model->nro_patrimonio);

		$dataProvider=new CActiveDataProvider('PatrimonioItem', array(
							'criteria'=>$criteria, 
							'pagination'=>array('pageSize'=>10,),
    						));
    						
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
}
