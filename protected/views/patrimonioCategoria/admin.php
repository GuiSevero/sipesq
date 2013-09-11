<?php
$this->breadcrumbs=array(
	'Patrimônios'=>array('patrimoniotermo/index'),
	'Gerenciar Categorias',
);

$this->menu=array(
	array('label'=>'Ver Categorias', 'url'=>array('index')),
	array('label'=>'Criar Categoria', 'url'=>array('create')),
	array('label'=>'Gerenciar Categorias', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('patrimonio-categoria-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Categorias</h1>

<?php echo CHtml::link('Busca Avaçada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patrimonio-categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nome',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
