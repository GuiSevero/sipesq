<?php /* @var InstrumentoJuridico $model */ ?>
<div class="input">
	<?php echo $form->labelEx($model,'tipo_inst_juridico'); ?>
	<?php echo $form->dropDownList($model, 'tipo_inst_juridico', array(
			'Convênio'=>'Convênio'
		,	'Contrato de Repasse'=>'Contrato de Repasse'
		,	'Contrato de Prestação de Serviços'=>'Contrato de Prestação de Serviços'
		,	'Termo de Cooperação'=>'Termo de Cooperação'
	),array('prompt'=>'Tipo de Instrumento', 'class'=>'input-xlarge')); ?>
	<?php echo $form->error($model,'tipo_inst_juridico'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'nro_inst_juridico'); ?>
	<?php echo $form->textField($model, 'nro_inst_juridico', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'nro_inst_juridico'); ?>
</div>



<div class="input">
	<?php echo $form->labelEx($model,'unidade_admin_responsavel'); ?>
	<?php echo $form->textField($model, 'unidade_admin_responsavel', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'unidade_admin_responsavel'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'gestao_repassadora'); ?>
	<?php echo $form->textField($model, 'gestao_repassadora', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'gestao_repassadora'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'gestao_recebedora'); ?>
	<?php echo $form->textField($model, 'gestao_recebedora', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'gestao_recebedora'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'data_assinatura'); ?>
	<?php echo $form->textField($model, 'data_assinatura', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'data_assinatura'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'vigencia'); ?>
	<?php echo $form->textField($model, 'vigencia', array('class'=>'input-xlarge'));?>
	<?php echo $form->error($model,'vigencia'); ?>
</div>