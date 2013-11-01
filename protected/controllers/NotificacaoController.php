<?php

class NotificacaoController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // Qualquer pessoa logada
				'actions'=>array('view','render'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	*
	*
	* @param $id - identificador do usuário
	*/
	public function actionRender($id)
	{
		if (Yii::app()->user->getId() != $id) throw new CHttpException(403);


		$params = array('receiver'=>$id);
		$command =  Yii::app()->db->createCommand();
		$select = array(
					'notfid'
				,	'message'
				,	'read'
				,	'url'
				,	'time'				
		);
		$command->from('notificacao');
		$command->params = $params;
		$command->where = "receiver = :receiver";
		$command->select = implode(', ', $select);
		$command->order = 'time DESC';
		$command->limit(10);
		$results = $command->queryAll();

		$this->renderPartial('/layouts/menu/_notificacoes', array('notificoes'=>$results));

		Yii::app()->end();
	}


	public function actionView($id){

		$model = $this->loadModel($id);

		$model->read = true;
		if($model->save())
			$this->redirect($model->url);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Notificacao::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}