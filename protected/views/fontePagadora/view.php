<?php
$this->breadcrumbs=array(
	'Fonte Pagadoras'=>array('index'),
	$model->cod_fonte_pagadora,
);

$this->menu=array(
	array('label'=>'Listar Fontes', 'url'=>array('index')),
	array('label'=>'Adicionar Fonte', 'url'=>array('create')),
	array('label'=>'Editar Fonte', 'url'=>array('update', 'id'=>$model->cod_fonte_pagadora)),
	array('label'=>'Deletar Fonte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_fonte_pagadora),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Fontes', 'url'=>array('admin')),
);
?>

<h1>View FontePagadora #<?php echo $model->cod_fonte_pagadora; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nome',
		'descricao',
	),
)); ?>
