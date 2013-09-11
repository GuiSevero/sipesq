<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->termo->projeto->nome=>array('/projeto/view', 'id'=>$model->termo->projeto->cod_projeto),
	'Termo '.$model->termo->nro_termo_responsabilidade=>array('/patrimonioTermo/view', 'id'=>$model->termo->cod_termo),
	'Patrimônio '.$model->nro_patrimonio=>array('/patrimonioItem/view', 'id'=>$model->cod_item),
	'Editar',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create', 'id'=>$model->termo->cod_termo)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_item),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Editar Patrimônio  <?php echo $model->nro_patrimonio; ?></h1>
<div class="view">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>