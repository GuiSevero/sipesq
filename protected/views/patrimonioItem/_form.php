<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patrimonio-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="input">
			<label>Número do Termo de Responsabilidade <span class="required">*</span></label>
			<?php $termos = Projeto::model()->findByPk($model->termo->projeto->cod_projeto)->patrimonio_termos; ?>
			<?php  echo $form->dropDownList($model,'cod_termo', CHtml::listData($termos, 'cod_termo', 'nro_termo_responsabilidade'), array('prompt'=>'Selecione um Termo')); ?>
			<?php echo $form->error($model,'cod_termo'); ?>
		</div>

	<div class="input">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome'); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
	
	<div class="input">
			<label>Categoria do Item</label>
			<?php $categorias = array();?>
			<?php $categorias["NULL"] = "Não Selecionado";?>
			<?php $categorias = $categorias + CHtml::listData(PatrimonioCategoria::model()->findAll(array('order'=>'nome')), 'cod_categoria', 'nome')?>
			<?php  echo $form->dropDownList($model,'cod_categoria', $categorias); ?>
			<?php echo $form->error($model,'cod_categoria'); ?>
		</div>
	
		<div class="input">
		<?php echo $form->labelEx($model,'data_aquisicao'); ?>
		<?php $data_aquisicao = isset($model->data_aquisicao) ? date("Y-m-d",strtotime($model->data_aquisicao)) : date("Y-m-d")?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'PatrimonioItem[data_aquisicao]',
				'value'=>$data_aquisicao,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop','dateFormat'=>'yy-mm-dd'),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
		<?php echo $form->error($model,'data_aquisicao'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'nro_patrimonio'); ?>
		<?php echo $form->textField($model,'nro_patrimonio'); ?>
		<?php echo $form->error($model,'nro_patrimonio'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'localizacao'); ?>
		<?php echo $form->textField($model,'localizacao'); ?>
		<?php echo $form->error($model,'localizacao'); ?>
	</div>


	<div class="input">
		<?php echo $form->labelEx($model,'vendedor'); ?>
		<?php echo $form->textField($model,'vendedor'); ?>
		<?php echo $form->error($model,'vendedor'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->