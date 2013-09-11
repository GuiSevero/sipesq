<?php
$this->breadcrumbs=array(
	'Projetos'=>array('/projeto'),
	$model->projeto->nome=>array('/projeto/view', 'id'=>$model->projeto->cod_projeto),
	'Termo ' .$model->nro_termo_responsabilidade => array('/patrimonioTermo/view', 'id'=>$model->cod_termo),
	'Editar',
);

$this->menu=array(
	array('label'=>'Adicionar Item', 'url'=>array('patrimonioitem/create', 'id'=>$model->cod_termo)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_termo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Itens', 'url'=>array('patrimonioitem/admin', 'id'=>$model->cod_termo)),
	array('label'=>'Gerenciar Categorias', 'url'=>array('patrimoniocategoria/admin'), 'visible'=>Sipesq::isSupport()),
);
?>

<h2>Editar Termo <?php echo $model->nro_termo_responsabilidade; ?></h2>
<div class="view">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>