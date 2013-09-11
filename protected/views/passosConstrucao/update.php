<?php
$this->breadcrumbs=array(
	'Passos'=>array('index'),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Passos', 'url'=>array('index')),
	array('label'=>'Gerenciar Passos', 'url'=>array('admin')),
);
?>

<h1>Editar Passo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>