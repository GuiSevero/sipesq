<li>
	<div class="view <?php echo $data->class ?>">
		<?php echo CHtml::link(CHtml::encode($data->nome . '  (' .$data->prioridade_nome .')'), array('update', 'id'=>$data->id)); ?>
	</div>
</li>