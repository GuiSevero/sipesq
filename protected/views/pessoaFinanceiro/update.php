<?php
$this->breadcrumbs=array(
	'Bolsas e Recebimentos'=>array('index'),
	$model->cod_financeiro=>array('view','id'=>$model->cod_financeiro),
	'Editar',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar Recebimento<?php echo $model->cod_financeiro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>