<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="input">
		<?php echo $form->label($model,'cod_item'); ?>
		<?php echo $form->textField($model,'cod_item'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'cod_termo'); ?>
		<?php echo $form->textField($model,'cod_termo'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'nro_patrimonio'); ?>
		<?php echo $form->textField($model,'nro_patrimonio'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'localizacao'); ?>
		<?php echo $form->textField($model,'localizacao'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'data_aquisicao'); ?>
		<?php echo $form->textField($model,'data_aquisicao'); ?>
	</div>

	<div class="input">
		<?php echo $form->label($model,'vendedor'); ?>
		<?php echo $form->textField($model,'vendedor'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->