<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'funcoes-pessoa-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php Yii::app()->clientScript->registerScript('table_func',"

$('.func').hover(
 function(){
 $(this).addClass('table-line-over');
 }, 
 
 function(){
 	$(this).removeClass('table-line-over');
 }
);

")?>

<?php Yii::app()->clientScript->registerScript('ajax_func',"

$('.dropPessoa').change(
 function(){
 	
 	
 	cod_pessoa = $(this).val();
 	id = $(this).attr('id');
 	
 	$.get('/sipesq/index.php/funcoesPessoa/updateAjax/',
					
				{id: id,
				 cod_pessoa: cod_pessoa
				},function (data){
						$('#result').html(data);
						
					},
					\"html\");  
	//$('#result').fadeOut('slow').remove();					
			return false;
 }
);

")?>




	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input">
		<?php echo $form->labelEx($model,'funcao'); ?>
		<?php echo $form->textField($model,'funcao'); ?>
		<?php echo $form->error($model,'funcao'); ?>
	</div>

	<div class="input">
		<?php echo $form->labelEx($model,'cod_pessoa'); ?>
		<?php  echo $form->dropDownList($model,'cod_pessoa', CHtml::listData(Pessoa::model()->findAll(array('order'=>'equipe_atual DESC, nome')), 'cod_pessoa', 'nome', 'equipe')); ?>
		<?php echo $form->error($model,'cod_pessoa'); ?>
	</div>

	<div class="input buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<hr>
<h4>Editar Funções</h4>
<div class="view">
<?php $pessoas = FuncoesPessoa::model()->findAll(array('order'=>'funcao'))?>
<table>
<tr>
<th>Função</th><th>Pessoa</th>
</tr>
<?php foreach ($pessoas as $p):?>
	<tr class="func">
		<td>
			<?php echo CHtml::link('<i class="icon-pencil"></i> ' .CHtml::encode($p->funcao), array('update', 'id'=>$p->cod_funcao)); ?>
		</td>
		<td>
			<?php  echo CHtml::dropDownList($p->cod_funcao,$p->cod_pessoa, CHtml::listData(Pessoa::model()->findAll(array('order'=>'nome')), 'cod_pessoa', 'nome'), array('class'=>'dropPessoa')); ?>
		</td>
		<td>
			<?php echo CHtml::submitButton('Remover', array('submit'=>array('delete','id'=>$p->cod_funcao,'returnUrl'=>array($this->route)) ,'confirm'=>'Deseja remover esta função?', 'class'=>'btn btn-small btn-danger')); ?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<div id="result"></div>
</div>