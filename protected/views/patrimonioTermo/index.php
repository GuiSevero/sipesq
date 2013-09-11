<?php
$this->breadcrumbs=array(
	'Patrimonio Termos',
);

$this->menu=array(
	array('label'=>'Criar Termo', 'url'=>array('create')),
	array('label'=>'Ver Patrimônios', 'url'=>array('patrimonioitem/index')),
	array('label'=>'Gerenciar Termos', 'url'=>array('admin')),
	array('label'=>'Gerenciar Patrimônios', 'url'=>array('patrimonioitem/admin')),
	array('label'=>'Gerenciar Itens', 'url'=>array('patrimonioitem/admin')),
	array('label'=>'Gerenciar Categorias', 'url'=>array('patrimoniocategoria/admin')),
);
?>

<h1>Termos de Patrimônios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
