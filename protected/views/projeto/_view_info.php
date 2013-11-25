<h4>Informações Gerais</h4>
<div class="view">
<div class="row-fluid">
<div class="span6">
	<b><?php echo CHtml::encode($model->getAttributeLabel('nome_curto')); ?>:</b>
	<?php echo CHtml::encode($model->nome_curto); ?>
	<br />

	<b><?php echo CHtml::encode("Situação do Projeto"); ?>:</b>
	<?php echo CHtml::encode($model->situacao_text); ?>
	<br />
	
	<b><?php echo CHtml::encode("Tipo de Projeto"); ?>:</b>
	<?php echo CHtml::encode($model->categoria->nome); ?>
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
	<?php if($model->skydrive): ?>
	<b><?php echo CHtml::encode($model->getAttributeLabel('skydrive')); ?>:</b>
	<?php echo CHtml::link('<i class="icon icon-cloud" style="color: #094AB2;"></i>'
					, $model->skydrive
					, array('target'=>'_blank', 'title'=>'Skydrive')); ?> <br />
	<?php endif; ?>
</div>
<div class="span6">
	
  	
	<b>Orçamentado:</b> R$ <?php echo number_format($model->verba_orcamentada, 2, ',','.')?><br>
	<b>Recebido:</b> R$ <?php echo number_format($model->verba_recebida, 2, ',','.')?><br>
	<b>Gastos Comprometidos:</b> R$ <?php echo number_format($model->gasto_comprometido, 2, ',','.')?><br>
	<b>Saldo Disponível:</b> R$ <?php echo number_format($model->saldo_disponivel, 2, ',','.')?><br>
	<div class="progress">
		<?php if ($model->verba_recebida == 0)  $model->verba_recebida = -1; ?>
		<div class="bar bar-danger" style="width: <?php echo ($model->gasto_comprometido / $model->verba_recebida)*100?>%;"></div>
		<div class="bar" style="width: <?php echo ($model->saldo_disponivel / $model->verba_recebida)*100?>%;"></div>
	</div>
 </div>
</div> <!--/row-->
	<div class="row-fluid">
		<div class="span6">
			<h5>Convênio</h5>
			<?php $this->renderPartial('_view_convenio', array('model'=>$model->convenio)); ?>
		</div>
		<div class="span6">
			<h5>Instrumento Jurídico</h5>
			<?php $this->renderPartial('_view_inst_juridico', array('model'=>$model->instrumento_juridico)); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<h5>Descrição do Projeto</h5>
			<p><?php echo $model->descricao; ?></p>
		</div>
	</div>
</div>

<div class="view">
	<div class="row-fluid">
		<div class="span6">
			<h5>Coordenadores</h5>
			<b><?php echo CHtml::encode("Professor Responsável"); ?></b>
			<?php echo CHtml::encode($model->professor->nome); ?>
			<br />
			
			<b><?php echo CHtml::encode("Pós-Graduando Responsável"); ?>:</b>
			<?php if(is_object($model->pos_graduando)):?>
				<?php echo CHtml::encode($model->pos_graduando->nome); ?>
			<?php else:?>
			Não há pós-graduando responsável
			<?php endif;?>
			<br />
			
			<b><?php echo CHtml::encode("Graduando Responsável"); ?>:</b>
			<?php if(is_object($model->graduando)):?>
				<?php echo CHtml::encode($model->graduando->nome); ?>
			<?php else:?>
			Não há graduando responsável
			<?php endif;?>
			<br />
		</div>
		<div class="span6">
			<h5>Equipe de Apoio</h5>
			<ul class="unstyled">
			<?php foreach($model->pessoas_atuantes as $pessoa):?>
				 <li><b><?php echo CHtml::link(CHtml::encode($pessoa->nome), array('pessoa/view', 'id'=>$pessoa->cod_pessoa)); ?></b></li>
			<?php endforeach;?>
			</ul>	
		</div>
		
	
</div>
