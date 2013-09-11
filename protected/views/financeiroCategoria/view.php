<?php
$this->breadcrumbs=array(
	'Financeiro Categorias'=>array('index'),
	$model->cod_categoria,
);

$this->menu=array(
	array('label'=>'Ver Todas', 'url'=>array('index')),
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->cod_categoria)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_categoria),'confirm'=>'Tem certeza que deseja excluir este item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_categoria',
		'nome',
		'descricao',
	),
)); ?>
