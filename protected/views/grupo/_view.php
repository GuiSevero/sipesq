<?php
/* @var $this GrupoController */
/* @var $data Grupo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_grupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_grupo), array('view', 'id'=>$data->cod_grupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permissao')); ?>:</b>
	<?php echo CHtml::encode($data->permissao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />


</div>