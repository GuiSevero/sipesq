<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patrimonio-termo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="input">
			<?php if(Sipesq::isSupport()):?>
				<label>Projeto Vinculado <span class="required">*</span></label>
			<?php  echo $form->dropDownList($model,'cod_projeto', CHtml::listData(Projeto::model()->findAll(array('order'=>'nome')), 'cod_projeto', 'nome'), array('prompt'=>"Selecione um Projeto")); ?>
			<?php else:?>
				<p><b>Projeto Vinculado: <?php echo CHtml::encode(Projeto::model()->findByPk($model->cod_projeto)->nome);?></b><br></p>
			<?php endif;?>
			<?php echo $form->error($model,'cod_projeto'); ?>
		</div>

	<div class="input">
		<?php echo $form->labelEx($model,'orgao_responsavel'); ?>
		<?php echo $form->textField($model,'orgao_responsavel'); ?>
		<?php echo $form->error($model,'orgao_responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'responsavel'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
   		 'name'=>'PatrimonioTermo[responsavel]',
		 'value'=>$model->responsavel,
    	 'source'=>Pessoa::toArray(),
		));
		?>
		<?php echo $form->error($model,'responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'co_responsavel'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
   		 'name'=>'PatrimonioTermo[co_responsavel]',
		 'value'=>$model->co_responsavel,
    	 'source'=>Pessoa::toArray(),
		));
		?>
		<?php echo $form->error($model,'co_responsavel'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'nro_termo_responsabilidade'); ?>
		<?php echo $form->textField($model,'nro_termo_responsabilidade'); ?>
		<?php echo $form->error($model,'nro_termo_responsabilidade'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'data_termo'); ?>
		<?php $data_termo = isset($model->data_termo) ? date("Y-m-d",strtotime($model->data_termo)) : date("Y-m-d")?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'PatrimonioTermo[data_termo]',
				'value'=>$data_termo,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop','dateFormat'=>'yy-mm-dd'),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
		<?php echo $form->error($model,'data_termo'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->