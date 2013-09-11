<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_categoria), array('view', 'id'=>$data->cod_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />


</div>