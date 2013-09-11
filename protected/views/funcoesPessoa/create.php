<?php
$this->breadcrumbs=array(
	'Funções de Pessoas'=>array('index'),
	'Adicionar',
);

$this->menu=array(
	array('label'=>'Listar Funções', 'url'=>array('index')),
	array('label'=>'Gerenciar Funções', 'url'=>array('admin')),
);
?>

<h4>Adicionar Função</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>