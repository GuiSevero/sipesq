<?php
$this->breadcrumbs=array(
	'Bolsas e Recebimentos'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Adicionar Recebimento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pessoa-financeiro-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Bolsas e Recebimentos</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pessoa-financeiro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pessoa.nome',
		'data_inicio',
		'data_fim',
		'valor',
		'categoria',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
