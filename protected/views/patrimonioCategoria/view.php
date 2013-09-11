<?php
$this->breadcrumbs=array(
	'Patrimonio Categorias'=>array('index'),
	$model->cod_categoria,
);

$this->menu=array(
	array('label'=>'Listar Todas', 'url'=>array('index')),
	array('label'=>'Criar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->cod_categoria)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_categoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Categoria <?php echo $model->nome; ?></h1>
