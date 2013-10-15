<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/atividades.js')?>
<div class="row-fluid">
<fieldset>
	<div class="span8">
		<label>Projeto</label>
		<?php echo CHtml::dropDownList(
					'projeto'
				,	null
				,	CHtml::listData(Projeto::model()->findAll(array('order'=>'nome')), 'cod_projeto', 'nome', 'situacao_text')
				,	array('data-target'=>'pessoa', 'class'=>'input-xxlarge', 'id'=>'atv-projeto', 'prompt'=>'Selecione o Projeto')
			)
		?>
	
	<label>Categoria</label>
	<?php echo CHtml::dropDownList(
				'categoria'
			,	null
			,	CHtml::listData(AtividadeCategoria::model()->findAll(array('order'=>'nome')), 'cod_categoria', 'nome', 'categoriaPai.nome')
			,	array('id'=>'atv-categoria','data-target'=>'categoria', 'class'=>'input-xxlarge', 'prompt'=>'Selecione a Categoria')
		)
	?>
	<br>
	<?php echo CHtml::link('Adicionar Atividade', array('/atividade/create'), array('class'=>'btn btn-primary')); ?>
	</div>	
	<div class="span4">
		<label>Status</label>
		<?php //echo CHtml::checkBox('finalizado',true, array('id'=>"atv-finalizado", 'data-target'=>'finalizado'))?>
		<?php echo CHtml::dropDownList('status', null, array('0'=>"A Fazer",'2'=>"Finalizada"), array('id'=>"atv-status", 'data-target'=>'status', 'prompt'=>'Selecione um status'))?>
		
		<label>Respoonsável / Participante</label>
		<?php echo CHtml::dropDownList('responsavel', null, array('0'=>"Participante",'1'=>"Responsável"), array('id'=>"atv-responsavel", 'data-target'=>'responsavel'))?>
	</div>
</fieldset>
</div>


<div id="atv-json"></div>
<div id="more-atv"></div>
<script>

(function(){

	var options = {
		pessoa: <?php echo $data->cod_pessoa?>
	};
	var atividade = new Atividade('#atv-json', options);

	atividade.load(options);

	$('#atv-load-more').click(function(){
		atividade.load();
	});

	
	$('#atv-projeto').change(function(){
		$('#atv-json').html('');
		options.projeto = $(this).val();
		options.count = 0;
		atividade.load(options);
		
	});

	$('#atv-status').change(function(){
		$('#atv-json').html('');
		options.status = $(this).val();
		options.count = 0;
		atividade.load(options);
	});

	$('#atv-categoria').change(function(){
		$('#atv-json').html('');
		options.categoria = $(this).val();
		options.count = 0;
		atividade.load(options);
		
	});


	$('#atv-responsavel').change(function(){
		$('#atv-json').html('');
		if($(this).val() == '1'){
			options.responsavel = options.pessoa;
			options.pessoa = '';
		}
		
		if($(this).val() == '0'){
			options.pessoa = options.responsavel;
			options.responsavel = '';
		}
		options.count = 0;
		atividade.load(options);
		
	});

	
})();

</script>