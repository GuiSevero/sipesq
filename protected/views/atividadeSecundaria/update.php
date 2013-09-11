<?php
$this->breadcrumbs=array(
	'Atividade Secundarias'=>array('index'),
	$model->titulo,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Criar', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h4><?php echo $model->titulo; ?></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>