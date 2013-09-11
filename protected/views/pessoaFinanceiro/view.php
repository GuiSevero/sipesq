<?php

$pessoa = Pessoa::model()->findByPk($model->cod_pessoa); 

$this->breadcrumbs=array(
	'Bolsas e Recebimentos'=>array('index'),
	$model->pessoa->nome,
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->cod_financeiro)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_financeiro),'confirm'=>'Tem certeza que deseja excluir este item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<?php if(!$no_layout):?>
	<h1>Bolsa / Recebimento de  <?php echo $model->pessoa->nome; ?></h1>
<?php endif;?>

<div class="view ">
	<p>		
		<b><?php echo CHtml::encode("Pessoa"); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($model->pessoa->nome), array('pessoa/view', 'id'=>$model->pessoa->cod_pessoa)); ?>
		<br />
	
		<b><?php echo CHtml::encode("Fonte Pagadora"); ?>:</b>
		<?php echo CHtml::encode($model->fontePagadora->nome); ?>
		<br />
	
		<b><?php echo CHtml::encode("Categoria"); ?>:</b>
		<?php echo CHtml::encode($model->categoria); ?>
		<br />
	
		<?php if(is_object(($model->projeto))):?>
		<b><?php echo CHtml::encode($model->getAttributeLabel('projeto_vinculado')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($model->projeto->nome), array('projeto/view', 'id'=>$model->projeto->cod_projeto)); ?>
		<br />
		<?php endif;?>
	</p>
	<p>
		<b><?php echo CHtml::encode($model->getAttributeLabel('valor')); ?>:</b>
		R$<?php echo  CHtml::encode(number_format($model->valor,2,',','.')); ?>
		<br />
	
		<b><?php echo CHtml::encode("Valor já recebido"); ?>:</b>
		R$ <?php echo CHtml::encode(number_format($model->valor_recebido,2,',','.')); ?>
		(<?php  echo CHtml::encode(number_format($model->percentagem_recebida ,2,',','.') )?>%)
		<br />
	
		<b><?php echo CHtml::encode("Total a receber no período"); ?>:</b>
		R$ <?php echo CHtml::encode(number_format($model->valor_total,2,',','.')); ?>
		<br />
	</p>
	
	<b><?php echo CHtml::encode($model->getAttributeLabel('data_inicio')); ?>:</b>
	<?php echo CHtml::encode($model->data_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('data_fim')); ?>:</b>
	<span class="label <?php echo $model->class;?>">
		<?php echo CHtml::encode($model->data_fim); ?>
	</span>
	
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('data_relatorio')); ?>:</b>
	<?php echo CHtml::encode($model->data_relatorio); ?>
	<br />
	<b>Vigência: </b><?php echo $model->vigencia; if($model->vigencia > 1) echo " meses"; else echo " mês";?>
	<br>
	<b><?php echo CHtml::encode("Meses Trabalhados"); ?>:</b>
	<?php echo CHtml::encode($model->meses_trabalhados); ?>
	<br />
	

</div>

