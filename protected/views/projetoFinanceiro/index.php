<?php
$this->breadcrumbs=array(
	'Projeto Financeiros',
);

$this->menu=array(
	array('label'=>'Create ProjetoFinanceiro', 'url'=>array('create')),
	array('label'=>'Manage ProjetoFinanceiro', 'url'=>array('admin')),
);
?>

<h1>Projeto Financeiros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
