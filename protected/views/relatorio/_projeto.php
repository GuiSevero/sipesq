<?php Yii::app()->clientScript->registerScript('table_financeiro',"

$('.tbl-line-financeiro').hover(
 function(){
 $(this).addClass('table-line-over');
 }, 
 
 function(){
 	$(this).removeClass('table-line-over');
 }
);

")?>
<?php $valor_total_bolsistas = 0;?>
	<div class="view">
	<h4><b><?php echo CHtml::link(CHtml::encode($data->nome), array('projeto/view', 'id'=>$data->cod_projeto)) ?></b></h4>
		<?php if($data->ultima_modificacao != null):?>
			<p>Início: <?php echo date("Y-m-d", strtotime($data->data_inicio))?>
			<b><?php echo '>>'?></b> Término: <?php echo date("Y-m-d", strtotime($data->data_fim))?></p>
		<?php endif;?>
		<hr>
		<table id="tbl_fincaneiro">
		<tr><th>Tipo</th><th>Orçamentado (R$)</th><th>Gasto (R$)</th><th>Saldo (R$)</th></tr>
			<tr class="tbl-line-financeiro">
				<td><b>Custeio</b></td>
				<td class="verba-custeio"><?php echo CHtml::encode(number_format($data->verba_custeio,2,',','.')); ?></td>
				<td class="gasto-custeio"><?php echo CHtml::encode(number_format($data->gasto_custeio,2,',','.')); ?></td>
				<td class="saldo-custeio"><?php echo CHtml::encode(number_format($data->verba_custeio - $data->gasto_custeio,2,',','.')); ?></td>
			</tr>
			
			<tr class="tbl-line-financeiro">
				<td><b>Capital</b></td>
				<td class="verba-capital"><?php echo CHtml::encode(number_format($data->verba_capital,2,',','.')); ?></td>
				<td class="gasto-capital"><?php echo CHtml::encode(number_format($data->gasto_capital,2,',','.')); ?></td>
				<td class="saldo-capital"><?php echo CHtml::encode(number_format($data->verba_capital - $data->gasto_capital,2,',','.')); ?></td>
			</tr> 
			
			<tr class="tbl-line-financeiro">
				<td><b>Bolsas</b></td>
				<td class="verba-bolsa"><?php echo CHtml::encode(number_format($data->verba_bolsa,2,',','.')); ?></td>
				<td class="gasto-bolsa"><?php echo CHtml::encode(number_format($data->gasto_bolsa,2,',','.')); ?></td>
				<td class="saldo-bolsa"><?php echo CHtml::encode(number_format($data->verba_bolsa - $data->gasto_bolsa,2,',','.')); ?></td>
			</tr>
			
			<tr class="tbl-line-financeiro">
				<td ><b>Outros</b></td>
				<td class="verba-outros"><?php echo CHtml::encode(number_format($data->verba_outros,2,',','.')); ?></td>
				<td class="gasto-outros"><?php echo CHtml::encode(number_format($data->gasto_outros,2,',','.')); ?></td>
				<td class="saldo-outros"><?php echo CHtml::encode(number_format($data->verba_outros - $data->gasto_outros,2,',','.')); ?></td>
			</tr>
			
			<tr class="tbl-line-financeiro">
				<td><b>Total</b></td>
				<td class="verba-total"><?php echo CHtml::encode(number_format($data->verba_outros + $data->verba_bolsa + $data->verba_capital + $data->verba_custeio,2,',','.')); ?></td>
				<td class="gasto-total"><?php echo CHtml::encode(number_format($data->gasto_outros + $data->gasto_bolsa + $data->gasto_capital + $data->gasto_custeio,2,',','.')); ?></td>
				<?php $total_saldo = $data->verba_outros + $data->verba_bolsa + $data->verba_capital + $data->verba_custeio - ($data->gasto_outros + $data->gasto_bolsa + $data->gasto_capital + $data->gasto_custeio);?>
				<td class="saldo-total"><?php echo CHtml::encode(number_format($total_saldo,2,',','.')); ?></td>
			</tr>  
			
	 	</table>
</div> <!-- Fim div table financeiro e gráficos -->
	
