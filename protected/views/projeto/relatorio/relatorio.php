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
<div class="well well-small" id="descricao">
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

<!--  FINANCEIRO -->
<div id="financeiro" class="row span12" >
	<h4>Financeiro</h4>
	<?php $this->renderPartial('relatorio/_financeiro_relatorio', array('model'=>$model))?>	
</div> <!-- Fim Financeiro -->

<div class="row span12" id="atividades">
	<h4>Atividades</h4>
	<?php if(count($model->atividades) < 1):?>
	<div class="view">Não há atividades cadastradas neste projeto</div>
	<?php endif;?>
		<?php foreach ($model->atividades as $atividade):?>
		<dl class="atv-description">
			<dt>
			<b><?php echo CHtml::encode($atividade->nome_atividade); ?></b>
			<span class="atv-date"><?php echo Sipesq::date($atividade->data_fim)?></span>
			</dt>
			<dd>
			  <dl>
			  	<dt>Prazo</dt>
			  	<dd><?php echo Sipesq::date($atividade->data_inicio);?> a <?php echo Sipesq::date($atividade->data_fim);?></dd>
			  	<dt>Responsável</dt>
			  	<dd><?php echo CHtml::encode($atividade->responsavel->nome); ?></dd>
			  	<dt>Categoria</dt>
			  	<dd>
			  		<?php if(is_object($atividade->categoria)):?>
					<?php if($atividade->categoria->categoriaPai->cod_categoria != $atividade->categoria->cod_categoria ):?>
						<?php echo CHtml::encode($atividade->categoria->categoriaPai->nome);?> <b>&gt;</b> 
					<?php endif;?>
					 	<?php echo CHtml::encode($atividade->categoria->nome);?>
					<?php endif;?>
			  	</dd>
			  	<dt>Participantes</dt>
					<?php foreach($atividade->pessoas as $pess) echo "<dd>" .trim($pess->nome) ."</dd>"; ?>
			 	<dt>Projetos</dt>
						<?php foreach($atividade->projetos as $proj) echo "<dd>" .trim($proj->nome) ."</dd>";?>
			  </dl>
			</dd>
		</dl>
		<?php endforeach;?>	
	</div>