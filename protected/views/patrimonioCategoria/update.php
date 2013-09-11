<?php
$this->breadcrumbs=array(
	'Patrimônios'=>array('patrimoniotermo/index'),
	$model->cod_categoria=>array('view','id'=>$model->cod_categoria),
	'Editar',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Criar Categoria', 'url'=>array('create')),
	array('label'=>'Gerenciar Categorias', 'url'=>array('admin')),
);
?>

<h1>Editar <?php echo $model->nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>