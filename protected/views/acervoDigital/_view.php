<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autores')); ?>:</b>
	<?php echo CHtml::encode($data->autores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:</b>
	<?php echo CHtml::encode($data->ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_periodico')); ?>:</b>
	<?php echo CHtml::encode($data->nome_periodico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla_periodico')); ?>:</b>
	<?php echo CHtml::encode($data->sigla_periodico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_number')); ?>:</b>
	<?php echo CHtml::encode($data->issue_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('paginas')); ?>:</b>
	<?php echo CHtml::encode($data->paginas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtitulo')); ?>:</b>
	<?php echo CHtml::encode($data->subtitulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orgao')); ?>:</b>
	<?php echo CHtml::encode($data->orgao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editora')); ?>:</b>
	<?php echo CHtml::encode($data->editora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cidade_publicacao')); ?>:</b>
	<?php echo CHtml::encode($data->cidade_publicacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_edicao')); ?>:</b>
	<?php echo CHtml::encode($data->nro_edicao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->data_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_fim')); ?>:</b>
	<?php echo CHtml::encode($data->data_fim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_outros')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_outros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projeto')); ?>:</b>
	<?php echo CHtml::encode($data->projeto); ?>
	<br />

	*/ ?>

</div>