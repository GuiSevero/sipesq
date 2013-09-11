<?php /* @var PermissaoProjetoForm $projeto */ ?>
<h4>Permissões da Página dos Projetos</h4>
<div class="row-fluid">
	<div class="span6">
		<?php echo $form->labelEx($projeto,'informacoes'); ?>
		<?php echo $form->dropDownList($projeto, 'informacoes', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'informacoes'); ?>
	
		<?php echo $form->labelEx($projeto,'atividades'); ?>
		<?php echo $form->dropDownList($projeto, 'atividades', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'atividades'); ?>
	
		<?php echo $form->labelEx($projeto,'financeiro'); ?>
		<?php echo $form->dropDownList($projeto, 'financeiro', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'financeiro'); ?>
	
		<?php echo $form->labelEx($projeto,'documentos'); ?>
		<?php echo $form->dropDownList($projeto, 'documentos', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'documentos'); ?>
	
		<?php echo $form->labelEx($projeto,'gerencial'); ?>
		<?php echo $form->dropDownList($projeto, 'gerencial', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'gerencial'); ?>
	
		<?php echo $form->labelEx($projeto,'deletar'); ?>
		<?php echo $form->dropDownList($projeto, 'deletar', PermissaoProjeto::listPermitionData());?>
		<?php echo $form->error($projeto,'deletar'); ?>
	</div>
	
	<div class="span6">
		<h5>Rubricas</h5>
		<?php $data = CHtml::listData(Rubrica::model()->findAll(array('select'=>'cod_rubrica, nome')), 'cod_rubrica', 'nome')?>
		<?php echo CHtml::dropDownList("Rubrica", null, $data, array('id'=>'rubrica_id'))?><br>
		<?php echo CHtml::dropDownList("RubricaPermissao", null, Grupo::defaultPermitions(), array('id'=>'rubrica_permissao'))?><br>
		<?php echo CHtml::button("Adicionar", array('class'=>'btn btn-small', 'id'=>'rubrica_add'))?><br>
		
		<table class="table" id="rubrica_added" style="margin-top: 10px;">
			<tr><th>Rubrica</th><th>Permissão</th><th></th></tr>
		</table>
		<div class="view alert-info">
		<p>Observação: Caso o grupo tenha <b>Controle Total</b> da página <b>Financeiro</b> as permissões específicas de rubricas serão ignoradas, pois o grupo já possui controle total desta parte do projeto.
		</div>
	</div>
</div>

<script>
(function(){
	$('#rubrica_add').click(function(){

		var rubrica = {
			'cod_rubrica': $('#rubrica_id option:selected').val(),
			'nome':$('#rubrica_id option:selected').text(),
			'permissao': $('#rubrica_permissao option:selected').val(),
			'permissao_nome': $('#rubrica_permissao option:selected').text()
		};

		var input = document.createElement('input');
		$(input)
		.attr('type', 'hidden')
		.attr('disable', true)
		.attr('name', 'PermissaoProjetoForm[rubricas][' + rubrica.cod_rubrica + ']')
		.attr('id', 'PermissaoProjetoForm_rubrica' + rubrica.cod_rubrica)
		.val(JSON.stringify(rubrica)); 
			
		var item_remove = document.createElement('i');
		$(item_remove).addClass('icon icon-trash tip')
		.attr('title', 'Remover')
		.click(function(){ $('#perm_rubrica_' + rubrica.cod_rubrica).remove(); })
		.tooltip();

		var container = document.createElement('tr');
		$(container).attr('id', 'perm_rubrica_' + rubrica.cod_rubrica)
		.append("<td>" + rubrica.nome + "</td>")
		.append("<td>" + rubrica.permissao_nome + "</td>")
		.append($("<td>").append(item_remove))
		.append(input);

		$('#rubrica_added').append(container);
	
	}); 
})();




</script>