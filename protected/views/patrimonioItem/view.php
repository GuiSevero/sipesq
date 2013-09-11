<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->termo->projeto->nome=>array('/projeto/view', 'id'=>$model->termo->projeto->cod_projeto),
	'Termo '.$model->termo->nro_termo_responsabilidade=>array('/patrimonioTermo/view', 'id'=>$model->termo->cod_termo),
	'Patrimônio '.$model->nro_patrimonio,
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create', 'id'=>$model->termo->cod_termo)),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->cod_item)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_item),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Patrimônio #<?php echo $model->nro_patrimonio; ?></h1>

<div class="view">

	<b><?php echo CHtml::link(CHtml::encode($model->nome), array('view', 'id'=>$model->cod_item)); ?></b>
	<br />

	<b><?php echo CHtml::encode('Termo'); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(PatrimonioTermo::model()->findByPk($model->cod_termo)->nro_termo_responsabilidade), array('patrimoniotermo/view', 'id'=>$model->cod_termo)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($model->nome); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('nro_patrimonio')); ?>:</b>
	<?php echo CHtml::encode($model->nro_patrimonio); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($model->valor); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($model->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('localizacao')); ?>:</b>
	<?php echo CHtml::encode($model->localizacao); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('data_aquisicao')); ?>:</b>
	<?php echo CHtml::encode($model->data_aquisicao); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('vendedor')); ?>:</b>
	<?php echo CHtml::encode($model->vendedor); ?>
	<br />

</div>
