<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'passos-construcao-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="input">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textArea($model,'nome', array('cols'=>50, 'rows'=>10)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="input">
		<?php //echo $form->labelEx($model,'descricao'); ?>
		<?php //echo $form->textArea($model,'descricao',array('rows'=>3, 'cols'=>30)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'prioridade'); ?>
		<?php  echo $form->dropDownList($model,'prioridade', array('1'=>'Baixa', '2'=>'Média', '3'=>'Alta')); ?>
		<?php echo $form->error($model,'prioridade'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'finalizado'); ?>
		<?php echo $form->checkBox($model,'finalizado'); ?>
		<?php echo $form->error($model,'finalizado'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->