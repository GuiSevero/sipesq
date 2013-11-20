<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl .'/js/jquery.tokeninput.js');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/token/token-input.css');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/token/token-input-facebook.css');

$url_tokens = Yii::app()->createUrl('/pessoa/json');
Yii::app()->clientScript->registerScript('token_input_projeto',"
	
	prePop = JSON.parse($('#Projeto_pessoas_atuantes').val());
	
	$('#Projeto_pessoas_atuantes').tokenInput('{$url_tokens}',{
			searchingText: 'Buscando'
		,	hintText: 'Digite um nome'
		,	noResultsText: 'Resultado não encontrado'
		,	preventDuplicates: true
		,	prePopulate: (prePop.length > 0) ? prePop : null
		,	tokenValue: 'id'
		,	tokenDelimiter: ','
	});
");

$listDataPessoas = CHtml::listData(Pessoa::model()->with('categoria')->findAll(array('order'=>'equipe_atual DESC, t.nome')), 'cod_pessoa', 'nome', 'categoria.nome');

?>

<fieldset><legend>Responsáveis e Participantes</legend>
		<div class="control-group">
		<?php echo $form->labelEx($model,'cod_professor', array('class'=>'control-label'));?>
		<div class="controls"><?php echo $form->dropDownList($model,'cod_professor', $listDataPessoas, array('prompt'=>"Selecione um Professor", 'class'=>'input-xxlarge')); ?></div>
		<?php echo $form->error($model,'cod_professor'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'cod_pos_grad', array('class'=>'control-label'));?>
		<div class="controls"><?php  echo $form->dropDownList($model,'cod_pos_grad', $listDataPessoas, array('prompt'=>"Selecione um Pós-Graduando", 'class'=>'input-xxlarge')); ?></div>
		<?php echo $form->error($model,'cod_pos_grad'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'cod_grad', array('class'=>'control-label'));?>
		<div class="controls"><?php  echo $form->dropDownList($model,'cod_grad', $listDataPessoas, array('prompt'=>"Selecione um Graduando", 'class'=>'input-xxlarge')); ?></div>
		<?php echo $form->error($model,'cod_grad'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'pessoas_atuantes', array('class'=>'control-label')); ?>
		<div class="controls"><?php echo CHtml::textField('Projeto[pessoas_atuantes]', Sipesq::listDataToken($model->pessoas_atuantes, 'cod_pessoa', 'nome'), array('id'=>'Projeto_pessoas_atuantes')); ?></div>
		<?php echo $form->error($model,'pessoas_atuantes'); ?>
	</div>
</fieldset>