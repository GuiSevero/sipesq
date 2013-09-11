<?php
$this->breadcrumbs=array(
	'Atividade Secundarias',
);

$this->menu=array(
	array('label'=>'Criar', 'url'=>array('create')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<?php Yii::app()->clientScript->registerScript('tbl-atv-secundarias',"

$('.atv-sec').hover(
 function(){
 $(this).addClass('table-line-over');
 }, 
 
 function(){
 	$(this).removeClass('table-line-over');
 }
);

$('.atv-sec').click(
 function(){
 	id = $(this).attr('id');
 	url = '" .$this->createUrl('update') ."'
 	location.href = url + '/' + id;
 
 });

")?>

<h1>Atividade Secundárias</h1>
<?php $atividadesSecundarias = AtividadeSecundaria::model()->findAll(array('condition'=>"id = 'ATV_PESSOAFINANCEIRO'"));?>



<table id="tbl-atv-sec">
		<tr><th>Nome</th><th>Tipo</th><th>Prazo (meses)</th><th>Identificador</th></tr>
		<?php foreach($atividadesSecundarias as $atvSec):?>
			<tr class="atv-sec" id="<?php echo $atvSec->cod_atividade?>">
			<td><?php echo CHtml::encode($atvSec->titulo);?></td>
			<td><?php echo $atvSec->tipo;?></td>
			<td><?php echo $atvSec->prazo;?></td>
			<td><?php echo $atvSec->id;?></td>
			</tr> 
	 	<?php endforeach;?>
</table>
