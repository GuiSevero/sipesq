<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'autores'); ?>
		<?php echo $form->textField($model,'autores'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ano'); ?>
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome_periodico'); ?>
		<?php echo $form->textField($model,'nome_periodico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sigla_periodico'); ?>
		<?php echo $form->textField($model,'sigla_periodico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volume'); ?>
		<?php echo $form->textField($model,'volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue_number'); ?>
		<?php echo $form->textField($model,'issue_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paginas'); ?>
		<?php echo $form->textField($model,'paginas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subtitulo'); ?>
		<?php echo $form->textField($model,'subtitulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orgao'); ?>
		<?php echo $form->textField($model,'orgao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'editora'); ?>
		<?php echo $form->textField($model,'editora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cidade_publicacao'); ?>
		<?php echo $form->textField($model,'cidade_publicacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_edicao'); ?>
		<?php echo $form->textField($model,'nro_edicao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_inicio'); ?>
		<?php echo $form->textField($model,'data_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_fim'); ?>
		<?php echo $form->textField($model,'data_fim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categoria_outros'); ?>
		<?php echo $form->textField($model,'categoria_outros'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projeto'); ?>
		<?php echo $form->textField($model,'projeto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->