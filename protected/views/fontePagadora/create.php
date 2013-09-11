<?php
$this->breadcrumbs=array(
	'Fonte Pagadoras'=>array('index'),
	'Adicionar',
);

$this->menu=array(
	array('label'=>'Ver todas', 'url'=>array('index')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Adicionar Fonte Pagadora</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>