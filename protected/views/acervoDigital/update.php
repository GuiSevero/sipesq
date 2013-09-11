<?php
$this->breadcrumbs=array(
	'Acervo Digitals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AcervoDigital', 'url'=>array('index')),
	array('label'=>'Create AcervoDigital', 'url'=>array('create')),
	array('label'=>'View AcervoDigital', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AcervoDigital', 'url'=>array('admin')),
);
?>

<h1>Update AcervoDigital <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>