<?php
 $this->breadcrumbs=array(
	'Projetos'=>array('index'),
 	$projeto->nome=>array('view', 'id'=>$projeto->cod_projeto),	
	'Gerenciar Permissões',
);

$this->menu=array(
	array('label'=>'Ver Projeto', 'url'=>array('view', 'id'=>$projeto->cod_projeto)),
);

?>
<h4><b><?php echo CHtml::encode($projeto->nome);?></b></h4>
<h4>Cadastradar Pessoa</h4>
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'permissao-projeto-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
	<div class="alert alert-info">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  Campos com <strong>*</strong> são obrigatórios.
	</div>
	
	<?php
		 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
		 $footer = "</div>";
		echo $form->errorSummary($model, $header, $footer); 
	?>
	
	<?php  echo CHtml::dropDownList("PermissaoProjeto[cod_pessoa]",'', CHtml::listData(Pessoa::model()->findAll(array('order'=>'nome')), 'cod_pessoa', 'nome', 'equipe'), array('class'=>'dropPessoa', 'prompt'=>"Selecione uma Pessoa")); ?>
	<?php  echo CHtml::dropDownList("PermissaoProjeto[nivel_permissao]",'', Sipesq::listPermitionData(), array('class'=>'dropNivel', 'prompt'=>"Selecione a Permissão")); ?><br/>
	<?php echo CHtml::submitButton('Adicionar', array('class'=>'btn btn-info')); ?>
</div>
<?php $this->endWidget(); ?>

<br><br>
<h4>Pessoas Cadastradas</h4>

<div id="pessoas-permitidas">
	<table>
	<tr>
	<th>Pessoa</th><th>Nível de Permissão</th><th>Remover</th>
	</tr>
	<?php foreach ($data as $p):?>
	<tr class="permissoes">
			<td>
				<?php echo CHtml::link(CHtml::encode($p->pessoa->nome), array('pessoa/view', 'id'=>$p->cod_pessoa)); ?>
			</td>
			
			<td>
				<?php echo CHtml::encode($p->nivel); ?>
			</td> 
			<td>
				<?php echo CHtml::submitButton('Remover', array('submit'=>array('deletePermissao','id'=>$p->cod_projeto, 'cod_pessoa'=>$p->cod_pessoa,'returnUrl'=>array($this->route, 'id'=>$p->cod_projeto)) ,'confirm'=>'Deseja remover esta permissão?', 'class'=>'btn btn-small')); ?>
			</td>
	</tr>
	<?php endforeach;?>
	</table>
</div>


<h4>Adicionar Permissão</h4>
	<div class="form">
	<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'permissao-projeto-form',
			'enableAjaxValidation'=>false,
		)); 
			
			 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
			 $footer = "</div>";
			 
		 echo $form->errorSummary($model, $header, $footer);
		  
		 echo $form->dropDownList($model, 'cod_pessoa', CHtml::listData(Pessoa::model()->findAll(array('order'=>'nome')), 'cod_pessoa', 'nome', 'equipe'), array('prompt'=>"Selecione uma Pessoa", 'class'=>"input-block-level"));
		 
		 //echo $form->dropDownList($model, 'nivel_permissao', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));
		 
		 
	?>
	
	
	<table class="table table-condensed table-bordered table-hover table-striped" >
	 <tr>
	<th>Local</th><th>Nível de Informação</th>		
	 </tr>
	  <tr>
	  <td>Acesso a Informações</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'informacoes', Grupo::defaultPermitions());?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso ao Financeiro</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'financeiro', Grupo::defaultPermitions());?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso aos Documentos</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'documentos', Grupo::defaultPermitions());?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso as Atividades</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'atividades', Grupo::defaultPermitions());?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso ao Gerencial</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'gerencial', Grupo::binaryPermitions());?></td>
	  </tr>

	  <tr>
	  <td>Deleção</td>
	  <td><?php echo $form->dropDownList($model->permissao, 'deletar', Grupo::binaryPermitions());?></td>
	  </tr>
	  
	  <?php /* 
	  <?php foreach($model->getRubricas() as $key=>$rubrica):?>
	  <tr>
	  	<td><?php echo $rubrica['nome']?></td>
	  	<td>
	  		<?php echo CHtml::dropDownList('PermissaoProjeto[rubricas][]', $rubrica['cod_rubrica'], PermissaoProjeto::listPermitionData())?>
	  	</td>
	  </tr>
	  <?php endforeach;?>
	  */ ?>
	</table>
	<?php echo CHtml::submitButton('Adicionar', array('class'=>'btn btn-info'));
		  
		 $this->endWidget(); 
	?>
	</div>