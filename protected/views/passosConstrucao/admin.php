<?php
$this->breadcrumbs=array(
	'Passos'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Passos', 'url'=>array('index')),
	array('label'=>'Criar Passo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('passos-construcao-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Passos</h1>


<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'passos-construcao-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nome',
		'prioridade',
		'finalizado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
