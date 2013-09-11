<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto/index'),
	$model->projeto->nome=>array('/projeto/view', 'id'=>$model->projeto->cod_projeto),
   'Gastos e Verbas',
);

$this->menu=array(
	array('label'=>'Criar Gasto/Verba', 'url'=>array('create')),
);

?>

<h3><?php echo $model->projeto->nome?></h3>
<h4>Gastos e Verbas</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projeto-financeiro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		array(
		'name'=>'descricao',
		'value'=>$model->descricao,
		'type'=>'raw',
		),
		array(
		 	'header'=>'Tipo',
		 	'name'=>'categoria.nome_exibicao',		
		),
		'responsavel',
		'valor',
		array(
			'header'=>'Nota Fiscal',
			'name'=>'href',
			'value'=>$model->href,
			'type'=>'raw',
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/projeto/view", array("id" => $data->projeto->cod_projeto))',
		),
	),
)); ?>
