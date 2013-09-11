<?php
/* @var $this RubricaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rubricas',
);

$this->menu=array(
	array('label'=>'<i class="icon-tasks"></i> Listar Rubricas', 'url'=>array('index')),
	array('label'=>'<i class="icon-plus"></i> Adicionar Rubrica', 'url'=>array('create')),
);

function printChildren($father){
	 		if($father != null){
	 			
	 			foreach ($father->filhas as $filha){	 				
	 				printChildren($filha);
	 			}
	 			
	 			//echo '<br>';
	 		}
	 		
	 		echo $father->nome .',';
}

Yii::app()->clientScript->registerScript('tips',"
		$('.tip').tooltip();
	");

?>

<h1>Rubricas</h1>

<div class="view">
<table class="table table-bordered table-striped table-hover">

<thead>
<tr>
<th>Nome da Rubrica</th>
<th>Número</th>
<th>Menu</th>
</tr>
</thead>
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));  ?>
</table>
</div>