<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Adicionar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('financeiro-categoria-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Categorias</h1>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'financeiro-categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nome',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
