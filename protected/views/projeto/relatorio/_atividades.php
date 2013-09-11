<?php foreach ($model->atividades as $atividade):?>
<h5><?php echo Sipesq::date($atividade->data_fim)?> - <?php echo CHtml::encode($atividade->nome_atividade); ?></h5>
<i><?php echo CHtml::encode($atividade->responsavel->nome); ?></i>
<hr>
<?php endforeach;?>
<?php /*
	<?php if(count($model->atividades) < 1):?>
	<div class="view">Não há atividades cadastradas neste projeto</div>
	<?php endif;?>
		<?php foreach ($model->atividades as $atividade):?>
		<?php //$this->renderPartial('/atividade/_view', array('data'=>$atividade));?>
		<div class="row-fluid view">
			<div class="span12">
				<h3><?php echo CHtml::encode($atividade->nome_atividade); ?></h3>
			</div>
			<div class="span4">
				<ul>
			  	<li>Prazo</li>
			  	<li><?php echo Sipesq::date($atividade->data_inicio);?> a <?php echo Sipesq::date($atividade->data_fim);?></li>
			  	<li>Responsável</li>
			  	<li><?php echo CHtml::encode($atividade->responsavel->nome); ?></li>
			  	<li>Categoria</li>
			  	<li>
			  		<?php if(is_object($atividade->categoria)):?>
					<?php if($atividade->categoria->categoriaPai->cod_categoria != $atividade->categoria->cod_categoria ):?>
						<?php echo CHtml::encode($atividade->categoria->categoriaPai->nome);?> <b>&gt;</b> 
					<?php endif;?>
					 	<?php echo CHtml::encode($atividade->categoria->nome);?>
					<?php endif;?>
			  	</li>
			  </ul>
			</div>
			<div class="span4">
				<ul>
					<li>Participantes</li>
						<?php foreach($atividade->pessoas as $pess) echo "<li>" .trim($pess->nome) ."</li>"; ?>
				 	<li>Projetos</li>
							<?php foreach($atividade->projetos as $proj) echo "<li>" .trim($proj->nome) ."</li>";?>
				</ul>
			</div>
		</div>
		<?php endforeach;?>
		*/?>
