<?php
$this->breadcrumbs=array(
	'Patrimônios',
);

$this->menu=array(
	array('label'=>'Termos de Patrimônios', 'url'=>array('patrimoniotermo/index')),
	array('label'=>'Todos os Patrimônios', 'url'=>array('index')),
	array('label'=>'Gerenciar Patrimônios', 'url'=>array('admin')),
);
?>

<h1>Patrimonios</h1>

<?php
	 $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pessoa-form',
		'enableAjaxValidation'=>false,
		'action'=>array('/patrimonioitem/search/'),
		'method'=>'GET',
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'nro_patrimonio'); ?>
		<?php echo $form->error($model,'nro_patrimonio'); ?>
		<?php echo CHtml::submitButton('Buscar'); ?>
	
<?php $this->endWidget(); ?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
