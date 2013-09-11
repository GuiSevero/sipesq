<?php /* @var $data Contato */?>
<div class="sresult">
	
	<h5><i class="icon icon-briefcase" rel="tooltip" title="Projeto"></i> <?php echo CHtml::link(CHtml::encode($data->nome), array('/projeto/view', 'id'=>$data->cod_projeto)); ?></h5>
	
	<?php if($data->professor != null):?>
		<i class="icon icon-user"  rel="tooltip" title="Professor Responsável"></i>
		<?php echo CHtml::link(CHtml::encode($data->professor->nome), array('/pessoa/view', 'id'=>$data->professor->cod_pessoa)); ?>
		<br />
	<?php endif;?>
	
	<?php if($data->pos_graduando != null):?>
		<i class="icon icon-user"  rel="tooltip" title="Pós-Graduando Responsável"></i>
		<?php echo CHtml::link(CHtml::encode($data->pos_graduando->nome), array('/pessoa/view', 'id'=>$data->pos_graduando->cod_pessoa)); ?>
		<br />
	<?php endif;?>
	
	<?php if($data->graduando != null):?>
		<i class="icon icon-user"  rel="tooltip" title="Graduando Responsável"></i>
		<?php echo CHtml::link(CHtml::encode($data->graduando->nome), array('/pessoa/view', 'id'=>$data->graduando->cod_pessoa)); ?>
		<br />
	<?php endif;?>
	
	<i class="icon icon-info-sign"  rel="tooltip" title="Situação"></i>
	<?php echo CHtml::encode($data->situacao_text); ?>
	<br />
</div>

