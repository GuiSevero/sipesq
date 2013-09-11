<?php
$this->breadcrumbs=array(
	'Acervo Digitals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AcervoDigital', 'url'=>array('index')),
	array('label'=>'Create AcervoDigital', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acervo-digital-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Acervo Digitals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acervo-digital-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'autores',
		'ano',
		'nome_periodico',
		'sigla_periodico',
		'volume',
		/*
		'issue_number',
		'paginas',
		'titulo',
		'subtitulo',
		'orgao',
		'editora',
		'cidade_publicacao',
		'nro_edicao',
		'data_inicio',
		'data_fim',
		'categoria_outros',
		'projeto',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
