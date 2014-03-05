<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl .'/js/jquery.tokeninput.js');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/token/token-input.css');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/token/token-input-facebook.css');

Yii::app()->clientScript->registerScript('drop_categoria_pai',"

	$('#drop_categoria_pai').change(
	function(){
	 pai = $('#drop_categoria_pai').val();
	 $.get('/sipesq/index.php/atividadeCategoria/listChildren/'	,
					
				{id: pai},function (data){
						$('#Atividade_cod_categoria').html(data);
					},
					\"html\"); 
	}
	);
"); 

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/tiny_mce/tiny_mce.js');
Yii::app()->clientScript->registerScript('text-areas',"
		tinyMCE.init({
								mode : 'textareas',
								theme : 'simple',
								width: '500',
        						height: '150',
        						relative_urls : false,
        						language: 'pt'
							});
	");

$pess_tokens = Yii::app()->createUrl('/pessoa/json');
$proj_tokens = Yii::app()->createUrl('/projeto/json');
Yii::app()->clientScript->registerScript('token_input_pessoas',"
	
	prePopPessoas = JSON.parse($('#Atividade_pessoas').val());
	
	$('#Atividade_pessoas').tokenInput('{$pess_tokens}',{
			searchingText: 'Buscando'
		,	hintText: 'Digite um nome'
		,	noResultsText: 'Resultado não encontrado'
		,	preventDuplicates: true
		,	prePopulate: (prePopPessoas.length > 0) ? prePopPessoas : null
		,	tokenValue: 'id'
		,	tokenDelimiter: ','
	});


prePopProj = JSON.parse($('#Atividade_projetos').val());
	
	$('#Atividade_projetos').tokenInput('{$proj_tokens}',{
			searchingText: 'Buscando'
		,	hintText: 'Digite um nome'
		,	noResultsText: 'Resultado não encontrado'
		,	preventDuplicates: true
		,	prePopulate: (prePopProj.length > 0) ? prePopProj : null
		,	tokenValue: 'id'
		,	tokenDelimiter: ','
	});
");


?>
<div class="form">	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'atividade-form',
		'enableAjaxValidation'=>true,
		'errorMessageCssClass'=>'alert',
		//'htmlOptions'=>array('class'=>'form-horizontal'),
	)); ?>


	<?php CHtml::$errorCss = 'control-group warning';?>

	<div class="alert alert-info">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  Campos com <strong>*</strong> são obrigatórios.
	</div>
	
	<?php
		 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
		 $footer = "</div>";
		echo $form->errorSummary($model, $header, $footer); 
	?>


	<fieldset><legend>Informações Gerais</legend>

		<div class="control-group">
			<?php echo $form->labelEx($model,'nome_atividade'); ?>
			<div class="controls">
				<?php echo $form->textField($model, 'nome_atividade', array('class'=>'input-xxlarge'))?>
			</div>
			<?php echo $form->error($model,'nome_atividade'); ?>
		</div>

		<div class="control-group">
			<label>Categoria Primária</label>
			<div class="controls">
			<?php 
				$cPai = '';
				if(is_object($model->categoria) && is_object($model->categoria->categoriaPai))
					$cPai = $model->categoria->categoriaPai->cod_categoria; 
				
				 echo CHtml::dropDownList('drop_categoria_pai'
				 ,	$cPai
				 ,	CHtml::listData(AtividadeCategoria::model()->findAll(array(
				 	'order'=>'nome'
				 	, 'condition'=>'cod_categoria_pai = cod_categoria'))
				 	, 'cod_categoria', 'nome')
				 , array('class'=>'input-xxlarge')); 
			 ?>
			</div>
			 <br>
			<label>Categoria Secundária</label>
			<div class="controls">
				<?php echo $form->dropDownList($model,'cod_categoria'
				, CHtml::listData(AtividadeCategoria::model()->findAll(
					array('condition'=>'cod_categoria = ' .$model->cod_categoria))
					,'cod_categoria','nome')
				, array('class'=>'input-xxlarge')); ?>
			</div>
		</div>


		<div class="input">
		<?php echo $form->labelEx($model,'estagio');?>
		<?php  //echo $form->dropDownList($model,'estagio', array('0'=>'A Fazer', '1'=>'Finalizada')); ?>
		<?php  echo $form->checkBox($model,'estagio');?>
		<?php echo $form->error($model,'estagio'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model, 'descricao', array('rows'=>15))?>
		<br><?php echo $form->error($model,'descricao'); ?>
	</div>


	
	<div class="control-group ">
		<?php echo $form->labelEx($model,'data_inicio'); ?>
		<?php echo CHtml::tag('input', array('name'=>'Atividade[data_inicio]', 'type'=>'date', 'value'=> $model->isNewRecord ? date('Y-m-d') : $model->data_inicio))?>
		<?php echo $form->error($model,'data_inicio'); ?>
	</div>
	
	<div class="control-group ">
		<?php echo $form->labelEx($model,'data_fim'); ?>
		<?php echo CHtml::tag('input', array('name'=>'Atividade[data_fim]', 'type'=>'date', 'value'=> $model->isNewRecord ? date('Y-m-d') : $model->data_fim))?>
		<?php echo $form->error($model,'data_fim'); ?>
	</div>

		<div class="control-group">
			<?php echo $form->labelEx($model,'projetos', array('class'=>'control-label')); ?>
			<div class="controls"><?php echo CHtml::textField('Atividade[projetos]', Projeto::listDataToken($model->projetos), array('id'=>'Atividade_projetos')); ?></div>
			<?php echo $form->error($model,'projetos'); ?>
		</div>

	</fieldset>

	<fieldset><legend>Responsáveis e Participantes</legend>


		<div class="control-group">
		<?php echo $form->labelEx($model,'cod_pessoa');?>	
		<div class="controls">	
		<?php  echo $form->dropDownList($model,'cod_pessoa', CHtml::listData(Pessoa::model()->findAll(array('order'=>'equipe_atual DESC, nome')), 'cod_pessoa', 'nome', 'equipe'), array('class'=>'input-xxlarge')); ?>
		</div>
		<?php echo $form->error($model,'cod_pessoa'); ?>
		</div>


		<div class="control-group">
			<?php echo $form->labelEx($model,'pessoas', array('class'=>'control-label')); ?>
			<div class="controls"><?php echo CHtml::textField('Atividade[pessoas]', Pessoa::listDataToken($model->pessoas), array('id'=>'Atividade_pessoas')); ?></div>
			<?php echo $form->error($model,'pessoas'); ?>
		</div>

	</fieldset>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array(
			'id'=>'submitButton',
			'class'=>'btn btn-small btn-primary'
		)) ?> 					
	</div>
</div>
<?php $this->endWidget(); ?>