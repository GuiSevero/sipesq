<div class="form">	
	
<?php 
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl .'/js/kalendae/kalendae.css');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/kalendae/kalendae.standalone.min.js');

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

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/rubrica.orcamento.js', CClientScript::POS_END);

Yii::app()->clientScript->registerScript('orcamento',"
			
		orcamento = new Orcamento();
		
		$('#btnOrcamento').click(function(){
			orcamento.createField();
		});
		
		$('.tip').tooltip();
		
		$('.icon-trash').click(function(){
		console.log('teste');
			rubTarget = $(this).attr('data-remove-target'); 
			$(rubTarget).remove();
		});
		
");

Yii::app()->clientScript->registerScript('multiple-select',"

	$(\"select[multiple]\").bind(\"mousedown\", function(e) {
    	$(this).data(\"remove\", !$(e.target).is(\":selected\"));
    	$(this).data(\"selected\", $(this).find(\":selected\"));
 	 }).bind(\"mouseup\", function(e){
    	$(this).data(\"selected\").attr(\"selected\", \"selected\");
    	e.target.selected = $(this).data(\"remove\");
  		});
");


//Carrega máscara para moedas
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/jquery.maskMoney.js');
Yii::app()->clientScript->registerScript('currency', "

$('.money').maskMoney({thousands:'.', decimal:','});

		$('#projeto-form').submit(function(){
		$.each($('.money'), function(i,obj){
				$(obj).val($(obj).val().replace(/\./g,'').replace(',','.'));
			}
			);
		});
");


//Carrega editor de textos
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/tiny_mce/tiny_mce.js');
Yii::app()->clientScript->registerScript('text-areas',"
		tinyMCE.init({
								mode : 'exact',
								elements: 'Projeto_descricao',
								theme : 'simple',
								width: '100%',
        						height: '350',
        						relative_urls : false,
        						language: 'pt'
							});
		
");

?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projeto-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
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
	
	<?php $listDataPessoas = CHtml::listData(Pessoa::model()->with('categoria')->findAll(array('order'=>'equipe_atual DESC, t.nome')), 'cod_pessoa', 'nome', 'categoria.nome');?>
	<?php $listDataEquipe = CHtml::listData(Pessoa::model()->findAll(array('order'=>'equipe_atual DESC, nome')), 'cod_pessoa', 'nome', 'equipe'); ?>
	<div class="view">
		<fieldset>
			<legend>Informações Gerais</legend>			
			<div class="row-fluid">
				<div class="span6">
					<div class="control-group">
					<?php echo $form->labelEx($model,'nome'); ?>
					<?php echo $form->textField($model,'nome', array('class'=>'input-xxlarge')); ?>
					<?php echo $form->error($model,'nome'); ?>
					</div>
				</div>
			<div class="span4">
				<div class="control-group">
					<?php echo $form->labelEx($model,'nome_curto'); ?>
					<?php echo $form->textField($model,'nome_curto', array('class'=>'input-xlarge')); ?>
					<?php echo $form->error($model,'nome_curto'); ?>
				</div>
			</div>
			<div class="span2">	
				<div class="control-group">
					<?php echo $form->labelEx($model,'finalizado'); ?>
					<?php echo $form->checkBox($model,'finalizado'); ?>
					<?php echo $form->error($model,'finalizado'); ?>
				</div>
			</div>
			
			<div class="span3">
				<div class="control-group">
					<?php echo $form->labelEx($model,'situacao'); ?>
					<?php  echo $form->dropDownList($model,'situacao', $model->situacoes, array('prompt'=>"Situação do Projeto")); ?>
					<?php echo $form->error($model,'situacao'); ?>
				</div>
			</div>
			<div class="span4">
				<div class="control-group">
					<?php echo $form->labelEx($model,'codigo_projeto'); ?>
					<?php echo $form->textField($model,'codigo_projeto'); ?>
					<?php echo $form->error($model,'codigo_projeto'); ?>
				</div>
			</div>
			<div class="span4">
				<div class="control-group">
					<?php echo $form->labelEx($model,'cod_categoria'); ?>
					<?php echo $form->dropDownList($model,'cod_categoria', CHtml::listData(ProjetoCategoria::model()->findAll(array('order'=>'nome')), 'cod_categoria', 'nome'), array('prompt'=>"Selecione uma Categoria")); ?>
					<?php echo $form->error($model,'cod_categoria'); ?>
				</div>
			</div>
		</div> <!-- /row -->
		</fieldset>
		<div class="row-fluid">
		<div class="span6">
			<fieldset>
				<legend>Instrumento Jurídico</legend>
				<?php $this->renderPartial('_form_inst_juridico', array('model'=>$model->instrumento_juridico, 'form'=>$form)); ?>
			</fieldset>
		</div>
		<div class="span6">
			<fieldset>
				<legend>Convênio</legend>
				<?php $this->renderPartial('_form_convenio', array('model'=>$model->convenio, 'form'=>$form)); ?>
			</fieldset>
		</div>

	</div>	
	
	<div class="row-fluid">
		<div class="span4">
			<fieldset>
				<legend>Prazos</legend>
				<div class="input">
					<?php echo $form->labelEx($model,'data_inicio'); ?>
					<?php echo CHtml::tag('input', array('class'=>'auto-kal','name'=>'Projeto[data_inicio]', 'type'=>'date', 'value'=>$model->isNewRecord ? date('Y-m-d') : $model->data_inicio))?>
					<?php echo $form->error($model,'data_inicio'); ?>
				</div>
			
				<div class="input">
					<?php echo $form->labelEx($model,'data_fim'); ?>
					<?php echo CHtml::tag('input', array('class'=>'auto-kal', 'name'=>'Projeto[data_fim]', 'type'=>'date', 'value'=>$model->isNewRecord ? date('Y-m-d') : $model->data_fim))?>
					<?php echo $form->error($model,'data_fim'); ?>
				</div>
			
				<div class="input">
					<?php echo $form->labelEx($model,'data_relatorio'); ?>
					<?php echo CHtml::tag('input', array('class'=>'auto-kal','name'=>'Projeto[data_relatorio]', 'type'=>'date', 'value'=>$model->isNewRecord ? date('Y-m-d') : $model->data_relatorio))?>
					<?php echo $form->error($model,'data_relatorio'); ?>
				</div>
			</fieldset>
		</div>
		<div class="span8">
	   	<fieldset><legend>Responsáveis e Participantes</legend>
	   		<div class="input">
				<?php echo $form->labelEx($model,'cod_professor');?>
				<?php echo $form->dropDownList($model,'cod_professor', $listDataPessoas, array('prompt'=>"Selecione um Professor", 'class'=>'input-xxlarge')); ?>
				<?php echo $form->error($model,'cod_professor'); ?>
			</div>
			
			<div class="input">
				<?php echo $form->labelEx($model,'cod_pos_grad');?>
				<?php  echo $form->dropDownList($model,'cod_pos_grad', $listDataPessoas, array('prompt'=>"Selecione um Pós-Graduando", 'class'=>'input-xxlarge')); ?>
				<?php echo $form->error($model,'cod_pos_grad'); ?>
			</div>
			
			<div class="input">
				<?php echo $form->labelEx($model,'cod_grad');?>
				<?php  echo $form->dropDownList($model,'cod_grad', $listDataPessoas, array('prompt'=>"Selecione um Graduando", 'class'=>'input-xxlarge')); ?>
				<?php echo $form->error($model,'cod_grad'); ?>
			</div>
			
			<div class="input">
				<?php echo $form->labelEx($model,'pessoas_atuantes'); ?>
				<?php echo CHtml::textField('Projeto[pessoas_atuantes]', Sipesq::listDataToken($model->pessoas_atuantes, 'cod_pessoa', 'nome'), array('id'=>'Projeto_pessoas_atuantes')); ?>	
				<?php echo $form->error($model,'pessoas_atuantes'); ?>
				<div class="hint">Segure a tecla <b>CTRL</b> para selecionar mais de uma pessoa.</div><br>
			</div>
	   	</fieldset>
	</div>
	</div>
	
	<?php if(Sipesq::getPermition('projeto.financeiro') >= 2) :?>
	<fieldset><legend>Orçamento</legend>
	<div id="orcamento" data-count="<?php echo count($model->orcamentos); ?>">
		<?php echo CHtml::dropDownList('Rubrica', null, CHtml::listData(Rubrica::model()->findAll(array('order'=>'nome')), 'cod_rubrica', 'nome'), array('class'=>'input-xxlarge', 'id'=>'list-rubricas'));?>
		<div class="input-prepend input-append">
  			<span class="add-on">R$</span>
  			<?php echo CHtml::textField('Rubrica_valor', 0, array('class'=>'money input-small', 'id'=>'rubrica-valor'))?>
  			<span class="add-on"><?php echo CHtml::link('Adicionar','', array('id'=>'btnOrcamento'))?></span>
		</div><hr>
		
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Rubrica</th>
					<th>Valor Orçamentado (R$)</th>
					<?php if(Sipesq::getPermition('projeto.financeiro') >= 100) :?>
					<th></th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody id="table-orcamento">
			<?php foreach($model->orcamentos as $k=>$orc):?>
				<tr class="item-<?php echo $orc->cod_rubrica?>">
					<td><?php echo $orc->rubrica->nome ?></td>
					<td><?php echo number_format($orc->valor, 2, ',','.') ?></td>
					<?php if(Sipesq::getPermition('projeto.financeiro') >= 100) :?>
					<td><i class="icon icon-trash tip" data-remove-target=".item-<?php echo $orc->cod_rubrica?>" title="Remover"></i></td>
					<?php endif; ?>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>

	
		<?php foreach($model->orcamentos as $i=>$orc):?>
			<?php echo CHtml::hiddenField('Orcamento[' .$i .'][valor]', $orc->valor, array('class'=>'item-' .$orc->cod_rubrica))?>
			<?php echo CHtml::hiddenField('Orcamento[' .$i .'][cod_rubrica]', $orc->cod_rubrica, array('class'=>'item-' .$orc->cod_rubrica))?>
		<?php endforeach;?>
	</div>
	</fieldset>
<?php endif; ?>
	
	<fieldset>
		<legend><b>Descrição</b></legend>
		<?php echo $form->textArea($model, 'descricao')?>
		<?php echo $form->error($model,'descricao'); ?>
	</fieldset>
	
	
	
	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->