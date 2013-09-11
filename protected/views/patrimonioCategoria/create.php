<?php
$this->breadcrumbs=array(
	'Patrimônios'=>array('patrimoniotermo/index'),
	'Adicionar Categoria',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Criar Categoria', 'url'=>array('create')),
	array('label'=>'Gerenciar Categorias', 'url'=>array('admin')),
);
?>

<h1>Adicionar Categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>