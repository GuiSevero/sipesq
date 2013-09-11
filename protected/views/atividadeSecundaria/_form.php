<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atividade-secundaria-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo'); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="input" style="float: left; width: 72%;">
	
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php $this->widget('application.extensions.tinymce.ETinyMce', array('htmlOptions'=>array('cols'=>60, 'rows'=>20),'name'=>'AtividadeSecundaria[descricao]','editorTemplate'=>'simple',  'value'=>$model->descricao)); ?>
		<?php echo $form->error($model,'descricao'); ?>
		
	</div>
	<div class="info amarelo" style="margin-top: 25px; text-align: left;">
		<p>Na descrição você pode usar parâmetros como <b>{RESPONSAVEL}, {ATUANTE}, {PROJETO} </b> para que no texto da descrição apareça estes parâmetros. Note que estes valores podem ser mais de um.</p>
		</div>
		
	<div style="clear: both"></div>
	<div class="input">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php  echo $form->dropDownList($model,'tipo', array('ONCREATE'=>"ON CREATE", 'ONFINISH'=>"ON FINISH")); ?>
		<?php echo $form->error($model,'tipo'); ?>
		
		<div class="info amarelo" style=" margin-top: -5px;">
			<p>Esta opção está relacionada a qual data do "evento" que a atividade secundária estará relacionada.
				Por exemplo: Relacionando esta atividade a uma <b>pessoa</b> e escolhendo o tipo <b>ONCREATE</b> esta atividade secundária valerá do momento da criação desta pessoa até o prazo escolhido.
			</p>
		</div> 
		
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'prazo'); ?>
		<?php echo $form->textField($model,'prazo'); ?>
		<?php echo $form->error($model,'prazo'); ?>
		<div class="info amarelo" style=" margin-top: -5px;">
			<p>
				O prazo, em meses, vai ser calculado depois do início de um evento (no caso de ONCREATE) ou antes do término de um evento (no caso de ONFINISH).
			</p>
		</div> 
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
		<div class="info amarelo" style=" margin-top: -5px;">
			<p>
			  O identificador vai ser usado na seleção das atividades secundária no momento em que são criadas. Ex: Ao criar uma pessoa, o sistema pode chamar a atividade secundária <b>"ATV_ONCREATE_PESSOA"</b> que será disparada a pós a criação desta pessoa.
			</p>
		</div> 
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->