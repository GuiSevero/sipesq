<?php
$this->breadcrumbs=array(
	'Projeto Financeiros'=>array('index'),
	$model->cod_projeto_financeiro=>array('view','id'=>$model->cod_projeto_financeiro),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjetoFinanceiro', 'url'=>array('index')),
	array('label'=>'Create ProjetoFinanceiro', 'url'=>array('create')),
	array('label'=>'View ProjetoFinanceiro', 'url'=>array('view', 'id'=>$model->cod_projeto_financeiro)),
	array('label'=>'Manage ProjetoFinanceiro', 'url'=>array('admin')),
);
?>

<h1>Update ProjetoFinanceiro <?php echo $model->cod_projeto_financeiro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>