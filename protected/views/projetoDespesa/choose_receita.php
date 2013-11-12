<?php
/* @var $this ProjetoDespesaController */
/* @var $model Projeto */

$this->breadcrumbs=array(
		'Projetos'=>array('/projeto/index'),
		$model->nome=>array('/projeto/view', 'id'=>$model->cod_projeto),
		'Adicionar Despesa',
);

$this->menu=array(
		array('label'=>'Voltar ao Projeto', 'url'=>array('/projeto/view', 'id'=>$model->cod_projeto)),
);

Yii::app()->clientScript->registerScript("popover", "
	$('.pop-over').popover();
	$('.tip').css('cursor', 'pointer').tooltip();	
");

?>

<h3>Selecione uma rubrica</h3>

<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Cuidado!</strong> Valores com <strong style="color: red;">*</strong> podem sofrer redução por compartilharem receita com outras rubricas.
</div>

<?php
function printChildren($rubrica, $receita){
	 		if($rubrica != null){

	 			if(count($rubrica->filhas) < 1){
	 				echo '<li>';
	 				echo CHtml::link($rubrica->numero .' ' .$rubrica->nome
							, array('/projetoDespesa/add', 'id'=>$receita->cod_verba, 'ru'=>$rubrica->cod_rubrica)
							, array('class'=>'pop-over'
									, 'data-content'=>$rubrica->descricao
									, 'data-title'=>$rubrica->nome //'Disponível: R$ '.Yii::app()->format->number($saldo)
									, 'data-trigger'=>'hover'
									, 'data-placement'=>'right')); 
		 			echo '</li>'; 
	 			}

	 			foreach ($rubrica->filhas as $filha){
	 				printChildren($filha, $receita);
	 			}
	 		}
	 		
	 		
}
?>
<div class="view">
	<ul class="unstyled">
	<?php foreach($model->receitas as $receita):?>
			<?php foreach($receita->rubricas as $rubrica):?>
				<?php 
					$gasto_rubrica = $receita->getGastosComprometidos($rubrica->cod_rubrica);
					$recebido = $gasto_rubrica
					+ min($receita->saldo_comprometido,
							($receita->projeto->getOrcamentado($rubrica->cod_rubrica) - $gasto_rubrica)
								
					);
					$gasto_comprometido = $receita->getGastosComprometidos($rubrica->cod_rubrica);
					$saldo = $recebido - $gasto_comprometido
				?>
				<li>
					<b><?php echo $rubrica->numero .' ' .$rubrica->nome?></b>
					<i>
					R$ <?php echo Yii::app()->format->number($saldo)?>
					<?php if(count($receita->rubricas) > 1):?>
						<span style="color: red;" class="tip" title="Receita compartilhada">*</span>
					<?php endif;?>
					disponíveis
					</i>
					<ul><?php echo printChildren($rubrica, $receita) ?></ul>
				</li>
				
			<?php endforeach;?>
	<?php endforeach;?>
	</ul>
</div>
