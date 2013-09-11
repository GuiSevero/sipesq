<h4>Atividades</h4>
	<?php if(count($model->atividades) < 1):?>
	<div class="view">Não há atividades cadastradas neste projeto</div>
	<?php endif;?>
	<?php foreach ($model->atividades as $atividade):?>
		<?php $this->renderPartial('/atividade/_view', array('data'=>$atividade));?> 
	<?php endforeach;?>
