<div class="form <?php echo $model->hasErrors()? 'control-group error' : ''?>">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projeto-financeiro-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'errorMessageCssClass'=>'control-group error',
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	
	<div class="alert alert-info">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  Campos com <strong>*</strong> são obrigatórios.
	</div>
	
	<?php
		 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
		 $footer = "</div>";
		echo $form->errorSummary($model, $header, $footer); 
	?>
		
		
		
		
  <?php if(!isset($model->cod_projeto)):?>
	<div class="row">
		<?php echo $form->labelEx($model,'cod_projeto'); ?>
		<?php $projetos["null"] = "Selecione um projeto";?>
		<?php $projetos = $projetos + CHtml::listData(Projeto::model()->findAll(array('order'=>'nome')), 'cod_projeto', 'nome')?>
		<?php  echo $form->dropDownList($model,'cod_projeto', $projetos); ?>
		<?php echo $form->error($model,'cod_projeto'); ?>
	</div>
  <?php endif;?>
  
  
  
  <!-- Rubrica -->



<div class="row">
		<?php echo $form->labelEx($model,'cod_rubrica'); ?>
		<div class="input-append">
			<?php  echo $form->dropDownList($model
			,'cod_rubrica'
			, CHtml::listData(ProjetoRubrica::model()->findAll(array('order'=>'nome')), 'cod_rubrica', 'nome')
			, array('id'=>'listRubricas')); ?>
  			<a id="modalBtn" class="btn" style="text-decoration: none;"><i class="icon-plus"></i> <b>Rubrica</b></a>
		</div>
		<?php echo $form->error($model,'cod_rubrica'); ?>
</div>
	
<!--  /Rubrica -->

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		
		<?php $tipos = CHtml::listData(ProjetoFinanceiroCategoria::model()->findAll(array('order'=>'nome', 'select'=>'nome, cod_categoria')), 'cod_categoria', 'nome_exibicao')?>
		<?php  echo $form->dropDownList($model,'tipo', $tipos, array('prompt'=>'Selecione uma Categoria')); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	
	

	
	<div class="row">
		<?php echo $form->labelEx($model,'responsavel'); ?>
		<?php echo $form->textField($model,'responsavel'); ?>
		<?php echo $form->error($model,'responsavel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<div class="input-prepend">
  			<span class="add-on">R$</span>
  			<?php echo $form->textField($model,'valor'); ?><span class="hint"> Valor em reais.</span>
		</div>
		<?php echo $form->error($model,'valor'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<br><span class="hint">Arquivos com no máximo 20MB</span>
		<br><span class="hint">OBS: No caso da existência de um arquivo a URL externa será ignorada.</span>
		<?php echo $form->error($model,'file'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php $this->widget('application.extensions.tinymce.ETinyMce', array('htmlOptions'=>array('cols'=>'2', 'rows'=>'2'),'value'=>$model->descricao,'name'=>'ProjetoFinanceiro[descricao]','editorTemplate'=>'simple', 'height'=>'150px', 'width'=>'60%')); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row buttons">
		<?php  echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-small')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="modal hide" id="modalTest">
          <div class="modal-header">
            <a class="close" data-dismiss="modal"><i class="icon icon-remove"></i></a>
            <h3>Adicionar Rubrica</h3>
          </div>
          <div class=".modal-body" id="modalBody" style="padding: 20px;">
           <?php $this->renderPartial('/projetoFinanceiro/_rubrica', array('model'=>new ProjetoRubrica()))?>
          </div>
          <div class="modal-footer">
            <button href="#" class="btn" data-dismiss="modal">Close</button>
   </div>
</div>
<?php //$this->renderPartial('_rubrica', array('model'=>new ProjetoRubrica()));?>
