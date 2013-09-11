<?php
$this->breadcrumbs=array(
	'Passos',
);

$this->menu=array(
	array('label'=>'Criar Passo', 'url'=>array('create')),
	array('label'=>'Gerenciar Passo', 'url'=>array('admin')),
);
?>

<h4>Passos</h4>
<p><i><?php echo count($dataProvider);?> passos encontrados.</i></p>
<ul>
<?php  /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */ ?>
<?php foreach($dataProvider as $data){
 		$this->renderPartial('_view', array('data'=>$data));
	  }
?>
</ul>