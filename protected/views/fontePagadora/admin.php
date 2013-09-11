<?php
$this->breadcrumbs=array(
	'Fonte Pagadoras'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Ver todas', 'url'=>array('index')),
	array('label'=>'Adicionar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fonte-pagadora-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Fontes Pagadoras</h1>


<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fonte-pagadora-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nome',
		'descricao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
