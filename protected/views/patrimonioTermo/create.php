<?php

$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->projeto->nome=>array('/projeto/view', 'id'=>$model->projeto->cod_projeto),
	'Adicionar',
);

$this->menu=array(
	//array('label'=>'Listar Termos', 'url'=>array('index')),
	//array('label'=>'Gerenciar Termos', 'url'=>array('admin', 'id'=>$model->projeto->cod_projeto)),
);
?>

<h1>Adicionar Termo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>