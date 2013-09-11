<?php
$this->breadcrumbs=array(
	'Acervo Digitals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AcervoDigital', 'url'=>array('index')),
	array('label'=>'Manage AcervoDigital', 'url'=>array('admin')),
);
?>

<h1>Create AcervoDigital</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>