<?php
/* @var $this ProjetoRubricaController */
/* @var $model ProjetoRubrica */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rubrica-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'errorMessageCssClass'=>'control-group error'
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>
	
	<div class="alert alert-info">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  Campos com <strong>*</strong> são obrigatórios.
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome', array('required'=>'required')); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero', array('required'=>'required')); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao', array('required'=>'required')); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>


	<div class="buttons">
		<?php //echo CHtml::submitButton('Submit'); ?>
		<?php echo CHtml::ajaxSubmitButton('Enviar'
		, $this->createUrl('/projetoFinanceiro/addRubrica')
		, array(
			'type'=>'POST'
			,'beforeSend'=>"function(){ console.log(this)}"
			,'success'=>"function(response){
				  $('#listRubricas').append(response);
			  }"
			, 'error'=>"function(){ $('.row').addClass('control-group error'); alert('Preencha todos os campos');}"
		)
		,array('class'=>"btn btn-primary", 'id'=>'btnSubmitRubrica')	
		)?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->