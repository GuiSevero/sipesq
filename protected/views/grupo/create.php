<?php
/* @var $this GrupoController */
/* @var $model Grupo */

$this->breadcrumbs=array(
		'Grupos'=>array('index'),
		'Create',
);

$this->menu=array(
		array('label'=>'List Grupo', 'url'=>array('index')),
		array('label'=>'Manage Grupo', 'url'=>array('admin')),
);
?>
<div class="row-fluid">
	<div class="span12">
		<h2>Adicionar Novo Grupo</h2>
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
