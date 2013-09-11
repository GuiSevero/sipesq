<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_projeto_financeiro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_projeto_financeiro), array('view', 'id'=>$data->cod_projeto_financeiro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_projeto')); ?>:</b>
	<?php echo CHtml::encode($data->cod_projeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


</div>