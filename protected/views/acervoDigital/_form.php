<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acervo-digital-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'autores'); ?>
		<?php echo $form->textField($model,'autores'); ?>
		<?php echo $form->error($model,'autores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome_periodico'); ?>
		<?php echo $form->textField($model,'nome_periodico'); ?>
		<?php echo $form->error($model,'nome_periodico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sigla_periodico'); ?>
		<?php echo $form->textField($model,'sigla_periodico'); ?>
		<?php echo $form->error($model,'sigla_periodico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'volume'); ?>
		<?php echo $form->textField($model,'volume'); ?>
		<?php echo $form->error($model,'volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_number'); ?>
		<?php echo $form->textField($model,'issue_number'); ?>
		<?php echo $form->error($model,'issue_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paginas'); ?>
		<?php echo $form->textField($model,'paginas'); ?>
		<?php echo $form->error($model,'paginas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo'); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtitulo'); ?>
		<?php echo $form->textField($model,'subtitulo'); ?>
		<?php echo $form->error($model,'subtitulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orgao'); ?>
		<?php echo $form->textField($model,'orgao'); ?>
		<?php echo $form->error($model,'orgao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'editora'); ?>
		<?php echo $form->textField($model,'editora'); ?>
		<?php echo $form->error($model,'editora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cidade_publicacao'); ?>
		<?php echo $form->textField($model,'cidade_publicacao'); ?>
		<?php echo $form->error($model,'cidade_publicacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_edicao'); ?>
		<?php echo $form->textField($model,'nro_edicao'); ?>
		<?php echo $form->error($model,'nro_edicao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_inicio'); ?>
		<?php echo $form->textField($model,'data_inicio'); ?>
		<?php echo $form->error($model,'data_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_fim'); ?>
		<?php echo $form->textField($model,'data_fim'); ?>
		<?php echo $form->error($model,'data_fim'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_outros'); ?>
		<?php echo $form->textField($model,'categoria_outros'); ?>
		<?php echo $form->error($model,'categoria_outros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projeto'); ?>
		<?php echo $form->textField($model,'projeto'); ?>
		<?php echo $form->error($model,'projeto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->