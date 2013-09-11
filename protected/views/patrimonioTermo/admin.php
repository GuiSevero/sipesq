<?php
$this->breadcrumbs=array(
	'Termos de Patrimônios'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Termos', 'url'=>array('index')),
	array('label'=>'Adicionar Termo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('patrimonio-termo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenicar Termos de Patrimônios</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrimonio-termo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cod_termo',
		'cod_projeto',
		'orgao_responsavel',
		'responsavel',
		'co_responsavel',
		'nro_termo_responsabilidade',
		/*
		'data_termo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
