<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('funcao')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->funcao), array('update', 'id'=>$data->cod_funcao)); ?>
	<br />

	<b><?php echo CHtml::encode('Pessoa'); ?>:</b>
	<?php echo CHtml::encode($data->pessoa->nome); ?>
	<br />
</div>