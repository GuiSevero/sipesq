<?php
$this->breadcrumbs=array(
	'Funcoes Pessoas'=>array('index'),
	$model->cod_funcao=>array('view','id'=>$model->cod_funcao),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Funções', 'url'=>array('index')),
	array('label'=>'Adicionar Função', 'url'=>array('create')),
	array('label'=>'Gerenciar Funções', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>