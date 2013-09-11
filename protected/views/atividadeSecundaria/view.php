<?php
$this->breadcrumbs=array(
	'Atividade Secundarias'=>array('index'),
	$model->cod_atividade,
);

$this->menu=array(
	array('label'=>'List AtividadeSecundaria', 'url'=>array('index')),
	array('label'=>'Create AtividadeSecundaria', 'url'=>array('create')),
	array('label'=>'Update AtividadeSecundaria', 'url'=>array('update', 'id'=>$model->cod_atividade)),
	array('label'=>'Delete AtividadeSecundaria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_atividade),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AtividadeSecundaria', 'url'=>array('admin')),
);
?>

<h1>View AtividadeSecundaria #<?php echo $model->cod_atividade; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_atividade',
		'titulo',
		'descricao',
		'tipo',
		'prazo',
		'id',
	),
)); ?>
