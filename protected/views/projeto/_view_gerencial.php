<?php 
$id = $_GET['id'];
$permissao = new PermissaoProjeto();
$permissao->cod_projeto = $id;
$permissoes = PermissaoProjeto::model()->findAll(array('condition'=>"cod_projeto = " .$id));

if(isset($_POST['PermissaoProjeto']))
{
	$permissao->attributes=$_POST['PermissaoProjeto'];
	if($permissao->save())
		$this->redirect(array('/projeto/gerencial', 'id'=>$id));
}

$t = json_encode(array(
		'financeiro'=>true
	,	'info'=>false
	,	'rubricas'=>$model->getRubricas()
	,	'docs'=>true
	,	'atividades'=>true			
));

?>

<a id="gerencial"></a>
<div id="tabGerencial">
	<h2>Gerencial</h2>
	<h4>Permissões do projeto  <?php echo CHtml::link("<i title='Editar' class='tip icon icon-pencil'></i>", array('/projeto/update','id'=>$model->cod_projeto))?></h4>
	<table class="table table-hover table-striped">
		<tr><th>Nome</th><th>Nível de Acesso</th><th>Detalhe</th></tr>
		<tr>
			<td><?php echo $model->professor->nome?></td>
			<td>Admin</td>
			<td>Professor Responsável</td>
		</tr>
		<tr>
			<td><?php echo $model->pos_graduando->nome?></td>
			<td>Admin</td>
			<td>Pós-graduando Responsável</td>
		</tr>
		<tr>
			<td><?php echo $model->graduando->nome?></td>
			<td>Admin</td>
			<td>Graduando Responsável</td>
		</tr>
		<?php foreach($model->pessoas_atuantes as $p):?>
			<tr>
				<td><?php echo $p->nome?></td>
				<td>Usuário</td>
				<td>Participante</td>
			</tr>
		<?php endforeach;?>
	</table>
	
	<h4>Outras permissões</h4>
	<table class="table table-hover table-striped">
	<tr><th>Nome</th><th>Nível de Acesso</th><th></th></tr>
	<?php foreach ($permissoes as $p):?>
	<tr class="permissoes">
			<td>
				<?php echo CHtml::link(CHtml::encode($p->pessoa->nome), array('pessoa/view', 'id'=>$p->cod_pessoa)); ?>
			</td>
			<td>
				<?php echo CHtml::encode($p->nivel); ?>
			</td> 
			<td>
				<?php echo CHtml::submitButton("Remover", array('submit'=>array('deletePermissao','id'=>$p->cod_projeto, 'cod_pessoa'=>$p->cod_pessoa,'returnUrl'=>array($this->route, 'id'=>$p->cod_projeto)) ,'confirm'=>'Deseja remover esta permissão?', 'class'=>'btn btn-small btn-danger')); ?>
			</td>
	</tr>
	<?php endforeach;?>
	</table>
	<h4>Adicionar Permissão</h4>
	<div class="form">
	<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'permissao-projeto-form',
			'enableAjaxValidation'=>false,
		)); 
			
			 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
			 $footer = "</div>";
			 
		 echo $form->errorSummary($permissao, $header, $footer);
		  
		 echo $form->dropDownList($permissao, 'cod_pessoa', CHtml::listData(Pessoa::model()->findAll(array('order'=>'nome')), 'cod_pessoa', 'nome', 'equipe'), array('prompt'=>"Selecione uma Pessoa", 'class'=>"input-block-level"));
		 
		 //echo $form->dropDownList($permissao, 'nivel_permissao', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));
		 
		 
	?>
	
	
	<table class="table table-condensed table-bordered table-hover table-striped" >
	 <tr>
	<th>Local</th><th>Nível de Informação</th>		
	 </tr>
	  <tr>
	  <td>Acesso a Informações</td>
	  <td><?php echo $form->dropDownList($permissao, 'info', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso ao Financeiro</td>
	  <td><?php echo $form->dropDownList($permissao, 'financeiro', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso aos Documentos</td>
	  <td><?php echo $form->dropDownList($permissao, 'docs', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso as Atividades</td>
	  <td><?php echo $form->dropDownList($permissao, 'atividades', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));?></td>
	  </tr>
	  
	  <tr>
	  <td>Acesso ao Gerencial</td>
	  <td><?php echo $form->dropDownList($permissao, 'gerencial', PermissaoProjeto::listPermitionData(), array('prompt'=>"Selecione uma Permissão"));?></td>
	  </tr>
	  
	  <?php foreach($model->getRubricas() as $key=>$rubrica):?>
	  <tr>
	  	<td><?php echo $rubrica['nome']?></td>
	  	<td>
	  		<?php echo CHtml::dropDownList('PermissaoProjeto[rubricas][]', $rubrica['cod_rubrica'], PermissaoProjeto::listPermitionData())?>
	  	</td>
	  </tr>
	  <?php endforeach;?>
	</table>
	<?php echo CHtml::submitButton('Adicionar', array('class'=>'btn btn-info'));
		  
		 $this->endWidget(); 
	?>
	</div>

</div><!-- /tab -->