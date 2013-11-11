<?php Yii::app()->clientScript->registerScript('table_financeiro',"

$('.tbl-line-financeiro').hover(
 function(){
 $(this).addClass('table-line-over');
 }, 
 
 function(){
 	$(this).removeClass('table-line-over');
 }
);

")?>

<!-- INFORMACOES GERAIS -->
<div id="descricao">

<h1><?php echo $model->nome?></h1>
<h4>Informações Gerais</h4>

	<b><?php echo CHtml::encode("Cordenador"); ?>:</b>
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
	<br />
	
	<div id="equipe">
	<dl>
	<dt>Equipe</dt>
	<?php foreach($model->pessoas_atuantes as $pessoa) echo "<dd>" .$pessoa->nome ."</dd>"?>
	</dl>
	
</div>
</div>
	
<hr>
<div class="row span12">
	<h4>Descrição</h4>
	<p><?php echo $model->descricao; ?></p>
</div>
<hr>

<div class="row span12" id="atividades">
	<?php $this->renderPartial('relatorio/_atividades', array('model'=>$model))?>	
</div>

<!--  FINANCEIRO -->
<div id="financeiro" class="row span12" >
	<h4>Financeiro</h4>
	<?php $this->renderPartial('relatorio/_financeiro_relatorio', array('model'=>$model))?>	
</div> <!-- Fim Financeiro -->

