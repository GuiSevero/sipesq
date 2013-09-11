<?php
$this->breadcrumbs=array(
	'Bolsas e Recebimentos'=>array('index'),
	'Adicionar',
);

$this->menu=array(
	array('label'=>'Ver Todos', 'url'=>array('index')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Adicionar Recebimento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>