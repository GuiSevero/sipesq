<div class="view">
	<b><?php echo CHtml::link(CHtml::encode($data->titulo), array('view', 'id'=>$data->cod_atividade)); ?></b>
	<br />
<p>
	<?php echo $data->descricao; ?>
</p>
</div>