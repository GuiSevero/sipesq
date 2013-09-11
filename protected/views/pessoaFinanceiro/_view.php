<div class="view">
	<p>		
		<b><?php echo CHtml::encode($data->getAttributeLabel('cod_financeiro')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->cod_financeiro), array('view', 'id'=>$data->cod_financeiro)); ?>
		<br />
	
		<b><?php echo CHtml::encode("Pessoa"); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->pessoa->nome), array('pessoa/view', 'id'=>$data->pessoa->cod_pessoa)); ?>
		<br />
	
		<b><?php echo CHtml::encode("Fonte Pagadora"); ?>:</b>
		<?php echo CHtml::encode($data->fontePagadora->nome); ?>
		<br />
	
		<b><?php echo CHtml::encode("Categoria"); ?>:</b>
		<?php echo CHtml::encode($data->categoria); ?>
		<br />
	
		<?php if(is_object(($data->projeto))):?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('projeto_vinculado')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->projeto->nome), array('projeto/view', 'id'=>$data->projeto->cod_projeto)); ?>
		<br />
		<?php endif;?>
	</p>
	<p>
		<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
		R$<?php echo  CHtml::encode(number_format($data->valor,2,',','.')); ?>
		<br />
	
		<b><?php echo CHtml::encode("Valor já recebido"); ?>:</b>
		R$ <?php echo CHtml::encode(number_format($data->valor_recebido,2,',','.')); ?>
		(<?php  echo CHtml::encode(number_format($data->percentagem_recebida ,2,',','.') )?>%)
		<br />
	
		<b><?php echo CHtml::encode("Total a receber no período"); ?>:</b>
		R$ <?php echo CHtml::encode(number_format($data->valor_total,2,',','.')); ?>
		<br />
	</p>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->data_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_fim')); ?>:</b>
	<span class="label <?php echo $data->class;?>">
		<?php echo CHtml::encode($data->data_fim); ?>
	</span>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_relatorio')); ?>:</b>
	<?php echo CHtml::encode($data->data_relatorio); ?>
	<br />
	<b>Vigência: </b><?php echo $data->vigencia; if($data->vigencia > 1) echo " meses"; else echo " mês";?>
	<br>
	<b><?php echo CHtml::encode("Meses Trabalhados"); ?>:</b>
	<?php echo CHtml::encode($data->meses_trabalhados); ?>
	<br />
	

</div>