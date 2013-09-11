<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Adicionar',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Adicionar Categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>