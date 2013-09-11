<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->termo->projeto->nome=>array('/projeto/view', 'id'=>$model->termo->projeto->cod_projeto),
	'Termo de Patrimônio '.$model->termo->nro_termo_responsabilidade=>array('/patrimonioTermo/view', 'id'=>$model->termo->cod_termo),
	'Adicionar Item',
);

$this->menu=array(
	//array('label'=>'Termos de Patrimônios', 'url'=>array('patrimoniotermo/index')),
	//array('label'=>'Todos os Patrimônios', 'url'=>array('index')),
	//array('label'=>'Gerenciar Patrimônios', 'url'=>array('admin')),
);
?>

<h1>Adicionar Patrimônio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>