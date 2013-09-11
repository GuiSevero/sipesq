<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pessoa-financeiro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input">
		<?php echo $form->labelEx($model,'cod_pessoa'); ?>
		<?php  echo $form->dropDownList($model,'cod_pessoa',CHtml::listData(Pessoa::model()->findAll(array('order'=>'equipe_atual DESC, nome')), 'cod_pessoa', 'nome', 'equipe'), array('prompt'=>"Selecione uma Pessoa") ); ?>
		<?php echo $form->error($model,'cod_pessoa'); ?>
	</div>
	
	<div class="input">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'data_inicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'PessoaFinanceiro[data_inicio]',
				'value'=>$model->data_inicio,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop','dateFormat'=>'yy-mm-dd'),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
		<?php echo $form->error($model,'data_inicio'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'data_fim'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'PessoaFinanceiro[data_fim]',
				'value'=>$model->data_fim,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop','dateFormat'=>'yy-mm-dd'),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
		<?php echo $form->error($model,'data_fim'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'data_relatorio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'PessoaFinanceiro[data_relatorio]',
				'value'=>$model->data_relatorio,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop','dateFormat'=>'yy-mm-dd'),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
		<?php echo $form->error($model,'data_relatorio'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'cod_fonte_pagadora'); ?>
		<?php  echo $form->dropDownList($model,'cod_fonte_pagadora',CHtml::listData(FontePagadora::model()->findAll(array('order'=>'nome')), 'cod_fonte_pagadora', 'nome') ); ?>
		<?php echo $form->error($model,'cod_fonte_pagadora'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<?php echo $form->textField($model,'categoria'); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>
	<div class="input">
		<?php echo $form->labelEx($model,'projeto_vinculado'); ?>
		<?php  echo $form->dropDownList($model,'projeto_vinculado',CHtml::listData(Projeto::model()->findAll(array('order'=>'nome')), 'cod_projeto', 'nome') ); ?>
		<?php echo $form->error($model,'projeto_vinculado'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->