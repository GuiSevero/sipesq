<h4>Atividades</h4>
	<?php if(count($model->atividades) < 1):?>
	<div class="view">Não há atividades cadastradas neste projeto</div>
	<?php endif;?>
		<?php foreach ($model->atividades as $atividade):?>
		<div class="view view-atividade">
			<h4><?php echo CHtml::encode($atividade->nome_atividade); ?></h4>
			<b>Categoria:</b> 
			<?php if(is_object($atividade->categoria)):?>
				<?php if($atividade->categoria->categoriaPai->cod_categoria != $atividade->categoria->cod_categoria ):?>
					<?php echo CHtml::encode($atividade->categoria->categoriaPai->nome);?> <b>&gt;</b> 
				<?php endif;?>
				 	<?php echo CHtml::encode($atividade->categoria->nome);?>
				<?php endif;?> <br>
			<b>Prazo:</b> <?php echo Sipesq::date($atividade->data_inicio);?> a <?php echo Sipesq::date($atividade->data_fim);?> <br>
			<b>Responsável:</b>	<?php echo CHtml::encode($atividade->responsavel->nome); ?><br>
			<b>Participantes:</b> <?php $pess = array(); foreach($atividade->pessoas as $p) $pess[] = $p->nome; echo implode(', ', $pess); ?><br>
			<b>Descrição</b>: <?php echo $atividade->descricao ?><br>

		</div>


		<?php endforeach;?>	