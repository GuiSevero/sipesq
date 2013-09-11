<?php
$this->breadcrumbs=array(
	'Bolsas e Recebimentos',
);

$this->menu=array(
	array('label'=>'Adicionar Recebimento', 'url'=>array('create')),
	array('label'=>'Gerenciar Recebimentos', 'url'=>array('admin')),
);
?>

<h1>Bolsas e Recebimentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
