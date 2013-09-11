<?php
$this->breadcrumbs=array(
	'Acervo Digitals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AcervoDigital', 'url'=>array('index')),
	array('label'=>'Create AcervoDigital', 'url'=>array('create')),
	array('label'=>'Update AcervoDigital', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AcervoDigital', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AcervoDigital', 'url'=>array('admin')),
);
?>

<h1>View AcervoDigital #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'autores',
		'ano',
		'nome_periodico',
		'sigla_periodico',
		'volume',
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
	),
)); ?>
