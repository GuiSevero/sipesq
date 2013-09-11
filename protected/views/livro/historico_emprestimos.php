<?php Yii::app()->clientScript->registerScript('table_livro',"

$('.livro').hover(
 function(){
 $(this).addClass('table-line-over');
 }, 
 
 function(){
 	$(this).removeClass('table-line-over');
 }
);

")?>

<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Histórico',
);

$this->menu=array(
	array('label'=>'Listar Livros', 'url'=>array('index')),
	array('label'=>'Adicionar Livro', 'url'=>array('create')),
	array('label'=>'Gerenciar Livros', 'url'=>array('admin')),
);
?>


	<?php if(count($historico_emprestimos) > 0):?>
		<br><br>
		<h4 align="center"><b>Histórico de Empréstimos</b></h4>
		<table id="tbl_livros">
		<tr><th>Nome</th><th>Livro</th><th>Retirada</th><th>Devolução</th></tr>
		<?php foreach($historico_emprestimos as $emprestimo):?>
			<tr class="livro <?php if($emprestimo->data_devolucao == null) echo "livro-emprestado";?>">
			<td><?php echo $emprestimo->pessoa->nome?></td>
			<td><?php echo $emprestimo->livro->titulo;?></td>
			<td><?php echo date("Y-m-d \a\s H:m",strtotime($emprestimo->data_retirada) )?></td>
			<?php if($emprestimo->data_devolucao != null):?>
			<td><?php echo date("Y-m-d",strtotime($emprestimo->data_devolucao) )?></td>
			<?php else:?>
			<td><?php echo CHtml::submitButton('Devolver', array('submit'=>array('devolucao','id'=>$emprestimo->cod_livro,'returnUrl'=>array($this->route)) ,'confirm'=>'Deseja devolver este livro?')); ?></td>
			<?php endif;?>
			
			</tr> 
	 	<?php endforeach;?>
	 	</table>
	 <?php else:?>
	 <h4>Não há empréstimos registrados</h4>
 	<?php endif;?>
