<?php 

Yii::app()->clientScript->registerScriptFile("https://www.google.com/jsapi", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/js/charts.js", CClientScript::POS_END);

Yii::app()->clientScript->registerScript('table_financeiro',"

$('.atv-desc').each(function(){

	$(this).html($(this).text());

});

")?>

<!-- INFORMACOES GERAIS -->
<div id="relatorio-header">
	<?php //echo CHtml::image('/sipesq/images/logo_ufrgs.png', 'Logo UFRGS', array('class'=>'logo', 'width'=>'150')); ?>
	<?php //echo CHtml::image('/sipesq/images/logo_cegov.png', 'Logo CEGOV', array('class'=>'logo','width'=>'140')); ?>
	<?php echo CHtml::encode($model->nome, array('id'=>'title')); ?>	
	<br />
</div>

<div class="relatorio-section">
	<span class="relatorio-number">1</span>Informações Gerais
</div>

<br />

<div class="relatorio-text">	
		<b><?php echo CHtml::encode("Coordenador"); ?>:</b>
		<?php echo CHtml::encode($model->professor->nome); ?>
		<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('codigo_projeto')); ?>:</b>
		<?php echo CHtml::encode($model->codigo_projeto); ?>
		<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('data_inicio')); ?>:</b>
		<?php echo CHtml::encode(Sipesq::date($model->data_inicio)); ?>
		<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('data_fim')); ?>:</b>
		<?php echo CHtml::encode(Sipesq::date($model->data_fim)); ?>
		<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('data_relatorio')); ?>:</b>
		<?php echo CHtml::encode(Sipesq::date($model->data_relatorio)); ?>

		<h5>Instrumento Jurídico Fundação de Apoio</h5>
		<?php $this->renderPartial('/projeto/_view_convenio', array('model'=>$model->convenio)); ?>
		<h5>Instrumento Jurídico Parceiro Institucional</h5>
		<?php $this->renderPartial('/projeto/_view_inst_juridico', array('model'=>$model->instrumento_juridico)); ?>
</div>
<br />
<br />

<div class="relatorio-section">
	<span class="relatorio-number">2</span>Equipe
</div>
<br />
<div class="relatorio-text">
	<?php foreach($model->pessoas_atuantes as $pessoa) echo  $pessoa->nome. "<br />" ?>
</div>

<br />
<br />

<div class="relatorio-section">
	<span class="relatorio-number">3</span>Descrição
</div>
<br />
<div class="relatorio-text">
	<?php echo $model->descricao; ?>
</div>

<br />
<br />

<div class="relatorio-section" id="section4">
	<span class="relatorio-number">4</span>Atividades
</div>
<br />
<div class="relatorio-text">
	<?php $this->renderPartial('relatorio/_atividades', array('model'=>$model))?>	
</div>

<br />
<br />

<div class="relatorio-section">
	<span class="relatorio-number">5</span>Financeiro
</div>

<div class="relatorio-text" >
	<?php $this->renderPartial('relatorio/_financeiro_relatorio', array('model'=>$model))?>	
</div>

