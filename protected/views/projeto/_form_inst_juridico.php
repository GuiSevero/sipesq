<?php /* @var InstrumentoJuridico $model */ ?>
<div class="input">
	<?php echo $form->labelEx($model,'nro_inst_juridico'); ?>
	<?php echo $form->textField($model, 'nro_inst_juridico');?>
	<?php echo $form->error($model,'nro_inst_juridico'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'tipo_inst_juridico'); ?>
	<?php echo $form->textField($model, 'tipo_inst_juridico');?>
	<?php echo $form->error($model,'tipo_inst_juridico'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'unidade_admin_responsavel'); ?>
	<?php echo $form->textField($model, 'unidade_admin_responsavel');?>
	<?php echo $form->error($model,'unidade_admin_responsavel'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'gestao_repassadora'); ?>
	<?php echo $form->textField($model, 'gestao_repassadora');?>
	<?php echo $form->error($model,'gestao_repassadora'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'gestao_recebedora'); ?>
	<?php echo $form->textField($model, 'gestao_recebedora');?>
	<?php echo $form->error($model,'gestao_recebedora'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($model,'data_assinatura'); ?>
	<?php echo $form->textField($model, 'data_assinatura');?>
	<?php echo $form->error($model,'data_assinatura'); ?>
</div>