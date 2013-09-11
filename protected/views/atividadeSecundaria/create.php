<?php
$this->breadcrumbs=array(
	'Atividade Secundarias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AtividadeSecundaria', 'url'=>array('index')),
	array('label'=>'Manage AtividadeSecundaria', 'url'=>array('admin')),
);
?>

<h1>Create AtividadeSecundaria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>