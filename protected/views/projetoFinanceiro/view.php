<?php
$this->breadcrumbs=array(
	'Projeto Financeiros'=>array('index'),
	$model->cod_projeto_financeiro,
);

$this->menu=array(
	array('label'=>'List ProjetoFinanceiro', 'url'=>array('index')),
	array('label'=>'Create ProjetoFinanceiro', 'url'=>array('create')),
	array('label'=>'Update ProjetoFinanceiro', 'url'=>array('update', 'id'=>$model->cod_projeto_financeiro)),
	array('label'=>'Delete ProjetoFinanceiro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_projeto_financeiro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjetoFinanceiro', 'url'=>array('admin')),
);
?>

<h1>View ProjetoFinanceiro #<?php echo $model->cod_projeto_financeiro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_projeto_financeiro',
		'cod_projeto',
		'descricao',
		'tipo',
		'responsavel',
		'valor',
	),
)); ?>
