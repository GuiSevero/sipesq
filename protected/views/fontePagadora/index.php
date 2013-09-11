<?php
$this->breadcrumbs=array(
	'Fontes Pagadoras',
);

$this->menu=array(
	array('label'=>'Create FontePagadora', 'url'=>array('create')),
	array('label'=>'Manage FontePagadora', 'url'=>array('admin')),
);
?>

<h1>Fontes Pagadoras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
