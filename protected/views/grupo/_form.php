<?php
/* @var $this GrupoController */
/* @var $model Grupo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupo-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="input">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('class'=>'input-xxlarge')); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
	<div class="row-fluid">
	<div class="span6">
		<?php echo $form->labelEx($model,'pessoas'); ?>
		<?php echo $form->listBox($model,'pessoas', CHtml::listData(Pessoa::model()->findAll(array('order'=>'equipe_atual DESC, nome')), 'cod_pessoa', 'nome', 'equipe'), array("multiple"=>"multiple", "size"=>"20","class"=>"input-xxlarge")  ); ?>
		<?php echo $form->error($model,'pessoas'); ?>
	</div>	
	<div class="span6">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50, 'class'=>'input-xxlarge')); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>
	</div>
	<?php $this->renderPartial('/grupo/forms/_permissoes', array('form'=>$form, 'model'=>$model))?>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->