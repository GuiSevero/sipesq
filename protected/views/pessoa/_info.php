	<p align="left"><b>Informações Pessoais</b></p>
	<div class="view">
	<b><?php  echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_mae')); ?>:</b>
	<?php echo CHtml::encode($data->nome_mae); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_nascimento')); ?>:</b>
	<?php echo CHtml::encode(date("d/m/Y",strtotime($data->data_nascimento))); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
	
	<b><?php echo CHtml::encode("Telefone"); ?>:</b>
	<?php echo CHtml::encode($data->telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpf')); ?>:</b>
	<?php echo CHtml::encode($data->cpf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rg')); ?>:</b>
	<?php echo CHtml::encode($data->rg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cidade')); ?>:</b>
	<?php echo CHtml::encode($data->cidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rua_complemento')); ?>:</b>
	<?php echo CHtml::encode($data->rua_complemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bairro')); ?>:</b>
	<?php echo CHtml::encode($data->bairro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cep')); ?>:</b>
	<?php echo CHtml::encode($data->cep); ?>
	<br />
	
	</div> <!-- Informações Pessoais -->
	
	<p align="left"><b>Informações Bancárias</b></p>
	<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco')); ?>:</b>
	<?php echo CHtml::encode($data->banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agencia')); ?>:</b>
	<?php echo CHtml::encode($data->agencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conta_corrente')); ?>:</b>
	<?php echo CHtml::encode($data->conta_corrente); ?>
	<br />
	
	<?php if(!empty($data->cod_banco)):?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('cod_banco')); ?>:</b>
		<?php echo CHtml::encode($data->cod_banco); ?>
		<br />
	<?php endif;?>
	</div> <!-- Informações Bancárias -->
	
	<p align="left"><b>Informações Acadêmicas</b></p>
	<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('cartao_ufrgs')); ?>:</b>
	<?php echo CHtml::encode($data->cartao_ufrgs); ?>
	<br />
	
	<b><?php echo CHtml::encode("Projetos em que atua"); ?>:</b>
	<?php for($i=0; $i< count($data->projetos_atuante);$i++):?>
		<?php echo CHtml::link(CHtml::encode($data->projetos_atuante[$i]->nome),array('/projeto/view', 'id'=>$data->projetos_atuante[$i]->cod_projeto)); if($i < count($data->projetos_atuante	) -1) echo ","?>
	<?php endfor;?>
	<br />
	
	<?php if(isset($data->categoria)):?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
		<?php echo CHtml::encode($data->categoria->nome); ?>
		<br />
	<?php endif;?>
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('lattes')); ?>:</b>
	<b><?php echo CHtml::link(CHtml::encode($data->lattes), $data->lattes, array('target'=>'_blank')); ?></b>
	<br />

	
	<?php if(isset($data->cod_vinculo_institucional)):?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_vinculo_institucional')); ?>:</b>
	<?php echo CHtml::encode($data->vinculo_institucional->nome); ?>
	<?php endif;?>
	</div> <!-- Informações Acadêmicas -->