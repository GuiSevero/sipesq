<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="input">
		<?php echo $form->label($model,'cod_funcao'); ?>
		<?php echo $form->textField($model,'cod_funcao'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'funcao'); ?>
		<?php echo $form->textField($model,'funcao'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'cod_pessoa'); ?>
		<?php echo $form->textField($model,'cod_pessoa'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->