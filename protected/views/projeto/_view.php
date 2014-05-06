<div class=" view ">
	<h4><b><?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->cod_projeto)); ?></b></h4>
	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_professor')); ?>:</b>
	<?php echo CHtml::encode($data->coordenador->nome); ?>
	<br />	
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_fim')); ?>:</b>
	<?php echo CHtml::encode(Sipesq::date($data->data_fim)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('situacao')); ?>:</b>
	<span class="label <?php echo $data->class?>"><?php echo CHtml::encode($data->situacao_text); ?></span>
</div>