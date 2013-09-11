<?php
$this->breadcrumbs=array(
	'Funções de Pessoas'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Funções', 'url'=>array('index')),
	array('label'=>'Adicionar Função', 'url'=>array('create')),
);

?>

<h1>Gerenciar Funções</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'funcoes-pessoa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'funcao',
		'pessoa.nome',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
