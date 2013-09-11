<?php
$this->breadcrumbs=array(
	'Passos'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Listar Passos', 'url'=>array('index')),
	array('label'=>'Adicionar Passo', 'url'=>array('create')),
	array('label'=>'Editar Passo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Passo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Passos', 'url'=>array('admin')),
);
?>

<h4><?php echo $model->nome; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nome',
		'prioridade',
		'finalizado',
	),
)); ?>
