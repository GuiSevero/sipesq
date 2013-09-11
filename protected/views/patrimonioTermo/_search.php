<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="input">
		<?php echo $form->label($model,'cod_termo'); ?>
		<?php echo $form->textField($model,'cod_termo'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'cod_projeto'); ?>
		<?php echo $form->textField($model,'cod_projeto'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'orgao_responsavel'); ?>
		<?php echo $form->textField($model,'orgao_responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'responsavel'); ?>
		<?php echo $form->textField($model,'responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'co_responsavel'); ?>
		<?php echo $form->textField($model,'co_responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'nro_termo_responsabilidade'); ?>
		<?php echo $form->textField($model,'nro_termo_responsabilidade'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'data_termo'); ?>
		<?php echo $form->textField($model,'data_termo'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->