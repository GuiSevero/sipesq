<?php
$this->breadcrumbs=array(
	'Passos'=>array('index'),
	'Adicionar',
);

$this->menu=array(
	array('label'=>'Listar Passos', 'url'=>array('index')),
	array('label'=>'Gerenciar Passos', 'url'=>array('admin')),
);
?>

<h1>Criar Passo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>