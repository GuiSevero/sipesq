<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->projeto->nome=>array('/projeto/view', 'id'=>$model->projeto->cod_projeto),
	'Termo ' .$model->nro_termo_responsabilidade,
);

$this->menu=array(
	array('label'=>'Adicionar Item', 'url'=>array('patrimonioitem/create', 'id'=>$model->cod_termo)),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->cod_termo)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_termo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Itens', 'url'=>array('patrimonioitem/admin', 'id'=>$model->cod_termo)),
	array('label'=>'Gerenciar Categorias', 'url'=>array('patrimoniocategoria/admin'), 'visible'=>Sipesq::isSupport()),
);
?>

<h1>Termo #<?php echo $model->nro_termo_responsabilidade; ?></h1>

<div class="view">
	<?php if(isset($model->projeto)):?>
	<b><label><?php echo CHtml::link(CHtml::encode($model->getAttributeLabel('cod_projeto') . ': ' .$model->projeto->nome), array('projeto/view', 'id'=>$model->projeto->cod_projeto)); ?></label></b>
	<br />
	<?php endif;?>

	<b><?php echo CHtml::encode($model->getAttributeLabel('orgao_responsavel')); ?>:</b>
	<?php echo CHtml::encode($model->orgao_responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('responsavel')); ?>:</b>
	<?php echo CHtml::encode($model->responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('co_responsavel')); ?>:</b>
	<?php echo CHtml::encode($model->co_responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('nro_termo_responsabilidade')); ?>:</b>
	<?php echo CHtml::encode($model->nro_termo_responsabilidade); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('data_termo')); ?>:</b>
	<?php echo CHtml::encode($model->data_termo); ?>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('valor_total')); ?>:</b>
	R$ <?php echo CHtml::encode($model->valor_total); ?>
	<br />
	
<br>
<hr>
<h2>Patrimônios Vinculados:</h2>

<?php if(isset($model->patrimonio_items)):?>
	<ul>
	<?php  foreach($model->patrimonio_items as $pItem):?>
	<li><?php echo CHtml::link(CHtml::encode($pItem->nome), array('/patrimonioItem/view', 'id'=>$pItem->cod_item)); ?>  (R$ <?php echo $pItem->valor;?>)</li>
	<?php endforeach;?>
	</ul>
<?php endif; ?>

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrimonio-item-grid',
	'dataProvider'=>$pItem->search(),
	'filter'=>$pItem,
	'columns'=>array(
		'nome',
		'nro_patrimonio',
		'valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); */ ?>
</div>