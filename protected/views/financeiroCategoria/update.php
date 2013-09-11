<?php
$this->breadcrumbs=array(
	'Financeiro Categorias'=>array('index'),
	$model->cod_categoria=>array('view','id'=>$model->cod_categoria),
	'Update',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Ver esta Categoria', 'url'=>array('view', 'id'=>$model->cod_categoria)),
	array('label'=>'Gerenciar Categorias', 'url'=>array('admin')),
);
?>

<h1>Editar Categoria <?php echo $model->nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>