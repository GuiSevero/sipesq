<?php
$this->breadcrumbs=array(
	'Funcoes Pessoas'=>array('index'),
	$model->cod_funcao,
);

$this->menu=array(
	array('label'=>'List FuncoesPessoa', 'url'=>array('index')),
	array('label'=>'Create FuncoesPessoa', 'url'=>array('create')),
	array('label'=>'Update FuncoesPessoa', 'url'=>array('update', 'id'=>$model->cod_funcao)),
	array('label'=>'Delete FuncoesPessoa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_funcao),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FuncoesPessoa', 'url'=>array('admin')),
);
?>

<h1>View FuncoesPessoa #<?php echo $model->cod_funcao; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_funcao',
		'funcao',
		'cod_pessoa',
	),
)); ?>
