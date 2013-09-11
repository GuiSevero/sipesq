<div class="view">

	<b><label><?php echo CHtml::link(CHtml::encode($data->getAttributeLabel('nro_termo_responsabilidade').' ' .$data->nro_termo_responsabilidade), array('view', 'id'=>$data->cod_termo)); ?></label></b>
	<br />
	<?php if(isset($data->projeto)):?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('cod_projeto')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->projeto->nome),array('/projeto/view','id'=>$data->projeto->cod_projeto)); ?>
		<br />
	<?php endif;?>
	
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('orgao_responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->orgao_responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->co_responsavel); ?>
	<br />
*/?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_termo')); ?>:</b>
	<?php echo CHtml::encode($data->data_termo); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_total')); ?>:</b>
	R$ <?php echo CHtml::encode($data->valor_total); ?>
	<br />
	
	<?php  if(isset($data->patrimonio_items)):?>
	<b><label>Items</label>:</b>
	<ul>
	<?php foreach($data->patrimonio_items as $item):?>
	<li><?php echo CHtml::link(CHtml::encode($item->nome), array('/patrimonioitem/view', 'id'=>$item->cod_item)); ?>  (R$ <?php echo $item->valor;?>)</li>
	<?php endforeach;?>
	</ul>
	<?php endif;?>
	
</div>

	


