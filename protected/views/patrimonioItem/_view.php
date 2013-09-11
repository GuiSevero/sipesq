<div class="view">

	<b><?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->cod_item)); ?></b>
	<br />

	<b><?php echo CHtml::encode('Termo'); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(PatrimonioTermo::model()->findByPk($data->cod_termo)->nro_termo_responsabilidade), array('patrimoniotermo/view', 'id'=>$data->cod_termo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_patrimonio')); ?>:</b>
	<?php echo CHtml::encode($data->nro_patrimonio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localizacao')); ?>:</b>
	<?php echo CHtml::encode($data->localizacao); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_aquisicao')); ?>:</b>
	<?php echo CHtml::encode($data->data_aquisicao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->vendedor); ?>
	<br />

	*/ ?>

</div>