<?php
$this->breadcrumbs=array(
	'Categorias de Patrimônios',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Criar Categoria', 'url'=>array('create')),
	array('label'=>'Gerenciar Categorias', 'url'=>array('admin')),
);
?>

<h1>Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
