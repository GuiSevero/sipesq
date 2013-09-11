<?php
$this->breadcrumbs=array(
	$model->termo->projeto->nome=>array('/projeto/view', 'id'=>$model->termo->projeto->cod_projeto),
	'Termo '.$model->termo->nro_termo_responsabilidade=>array('/patrimonioTermo/view', 'id'=>$model->termo->cod_termo),
	'Patrimônio '.$model->nro_patrimonio,
	'Gerenciar Itens',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('patrimonio-item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Itens
<?php if(isset($model->cod_termo)):?>
 do Termo <?php echo PatrimonioTermo::model()->findByPk($model->cod_termo)->nro_termo_responsabilidade;?>
<?php endif;?>
</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrimonio-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nome',
		'nro_patrimonio',
		'valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
