<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
	'Grupos'=>array('index'),
	$model->cod_grupo,
);

$this->menu=array(
	array('label'=>'List Grupo', 'url'=>array('index')),
	array('label'=>'Create Grupo', 'url'=>array('create')),
	array('label'=>'Update Grupo', 'url'=>array('update', 'id'=>$model->cod_grupo)),
	array('label'=>'Delete Grupo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_grupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupo', 'url'=>array('admin')),
);
?>

<div class="view"><?php echo $model->descricao; ?></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nome',
		'permissao',
		'descricao',
	),
)); ?>

