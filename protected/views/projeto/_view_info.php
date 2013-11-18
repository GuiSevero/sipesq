<h4>Informações Gerais</h4>
<div class="view">
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
	
	<b>Verba Orçamentada:</b>
	R$ <?php echo CHtml::encode(Yii::app()->format->number($model->verba_orcamentada)); ?>
	<br />
	
	<b>Verba Recebida</b>
	R$ <?php echo CHtml::encode(Yii::app()->format->number($model->verba_recebida)); ?>
	<br />

	<div class="row-fluid">
		<div class="span6">
			<h4>Convênio</h4>
			<?php $this->renderPartial('_view_convenio', array('model'=>$model->convenio)); ?>
		</div>
		<div class="span6">
			<h4>Instrumento Jurídico</h4>
			<?php $this->renderPartial('_view_inst_juridico', array('model'=>$model->instrumento_juridico)); ?>
		</div>
	</div>
</div>

<div class="view">
<?php echo $model->descricao; ?>
</div>
<div class="view">
		<h4>Equipe</h4>
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
		<ul>
		<?php foreach($model->pessoas_atuantes as $pessoa):?>
			 <li><b><?php echo CHtml::link(CHtml::encode($pessoa->nome), array('pessoa/view', 'id'=>$pessoa->cod_pessoa)); ?></b></li>
		<?php endforeach;?>
		</ul>
	
</div>
