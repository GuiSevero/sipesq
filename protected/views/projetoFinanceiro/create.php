<?php Yii::app()->clientScript->registerScript('modal', "

$('#modalBtn').click(function(){
	$('#modalTest').modal();
});

$('.icon-search').tooltip({title: 'Exibir Detalhes'});
$('.icon-pencil').tooltip({title: 'Editar'});
$('.icon-trash').tooltip({title: 'Excluir'}); 
$('.icon-plus').tooltip({title: 'Adicionar Item'});

");?>

<?php
$this->breadcrumbs=array(
	'Projetos'=>array('projeto/index'),
	'Adicionar Gasto / Verba',
);

$this->menu=array(
	array('label'=>'Listar Finanças', 'url'=>array('index')),
	array('label'=>'Gerenciar Finanças', 'url'=>array('admin')),
);
?>

<div class="hero well well-small">
<h3>Gastos e Verbas de Projetos</h3>

<?php if(isset($model->cod_projeto)):?>
		<h4> <?php echo Projeto::model()->findByPk($model->cod_projeto)->nome?></h4>
<?php endif;?>

</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<hr>
<div class="receitas">
	<h2>Receitas</h2>
	
	<div class="well well-small">
	<h3>Orçamentado</h3>
	<table class="table">
	<tr><th>Rubrica</th><th>Título</th><th>Valor</th><th>Anexo</th><th>Data Edição</th><th><i class="icon icon-plus"></i></th></tr>
	<tr><td>Verba Capital</td><td>Orçamentado na abertura do projeto</td><td>R$ 150.000,00</td><td>Arquivo 1</td><td>01/12/2012</td><td><i class="icon icon-search"></i> <i class="icon icon-pencil"></i> <i class="icon icon-trash"></i></td></tr>
	<tr><td>Verba Custeio</td><td>Orçamentado mimimi</td><td>R$ 10.000,00</td><td>Arquivo 2</td><td>01/12/2012</td><td><i class="icon icon-search"></i> <i class="icon icon-pencil"></i> <i class="icon icon-trash"></i></td></tr>
	<tr><td>Verba Projeto</td><td>Orçamentado mimimi</td><td>R$ 50.000,00</td><td>Arquivo 3</td><td>01/12/2012</td><td><i class="icon icon-search"></i> <i class="icon icon-pencil"></i> <i class="icon icon-trash"></i></td></tr>
	<tr><td>Verba Tráfico</td><td>Orçamentado mimimi</td><td>R$ 30.000,00</td><td>Arquivo 4</td><td>01/12/2012</td><td><i class="icon icon-search"></i> <i class="icon icon-pencil"></i> <i class="icon icon-trash"></i></td></tr>
	</table>
	
	<hr>
		
	<h3>Recebido</h3>
	<table class="table">
	<tr><th>Rubrica</th><th>Título</th><th>Valor</th><th>Anexo</th><th>Descrição</th><th><i class="icon icon-plus"></i></th></tr>
	<tr><td>Verba Capital</td><td>Recebido da boca da tinga</td><td>R$ 150.000,00</td><td>Arquivo 1</td><td>Teste de descricao</td><td><i class="icon icon-pencil"></i></td></tr>
	<tr><td>Verba Custeio</td><td>Morro do alemão</td><td>R$ 10.000,00</td><td>Arquivo 2</td><td>Teste de descricao</td><td><i class="icon icon-pencil"></i></td></tr>
	<tr><td>Verba Projeto</td><td>Orçamentado mimimi</td><td>R$ 50.000,00</td><td>Arquivo 3</td><td>Teste de descricao</td><td><i class="icon icon-pencil"></i></td></tr>
	<tr><td>Verba Tráfico</td><td>Orçamentado mimimi</td><td>R$ 30.000,00</td><td>Arquivo 4</td><td>Teste de descricao</td><td><i class="icon icon-pencil"></i></td></tr>
	</table>
	</div>
</div>


<div class="despesas">
	<div class="well well-small">
	
	<h3>Despesas</h3>
	<table class="table">
	<tr><th>Título</th><th>Valor</th><th>Anexo</th><th>Descrição</th><th><i class="icon icon-plus"></i></th></tr>
	<tr><td>Orçamentado mimimi</td><td>R$ 150.000,00</td><td>Arquivo 1</td><td>Teste de descricao</td><td><i class="icon icon-pencil"></i></td></tr>
	</table>
	</div>
</div>

