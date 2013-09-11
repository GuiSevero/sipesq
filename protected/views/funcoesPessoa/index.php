<?php
$this->breadcrumbs=array(
	'Funções de Pessoas',
);

$this->menu=array(
	array('label'=>'Adicionar Função', 'url'=>array('create')),
	array('label'=>'Gerenciar Funções', 'url'=>array('admin')),
);
?>

<h4>Funcoes Pessoas</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
