<?php
$this->breadcrumbs=array(
	'Fonte Pagadoras'=>array('index'),
	$model->nome=>array('view','id'=>$model->cod_fonte_pagadora),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Fontes', 'url'=>array('index')),
	array('label'=>'Adicionar Fonte', 'url'=>array('create')),
	array('label'=>'Gerenciar Fontes', 'url'=>array('admin')),
);
?>

<h1>Editar Fonte: <?php echo $model->nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>