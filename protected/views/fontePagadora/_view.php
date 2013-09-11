<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_fonte_pagadora')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->cod_fonte_pagadora)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />


</div>