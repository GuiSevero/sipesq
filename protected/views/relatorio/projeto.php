<script>
function filtraAtividade (){
    	var url = '?';

		var inicio = encodeURIComponent($('#inicio').val());
		if(inicio)
    		url += '&inicio=' + inicio;
		
    	var termino = encodeURIComponent($('#termino').val());
    	if(termino)
    		url += '&termino=' + termino;
    	

    	var projeto = $('#dropDownProjeto').val();
		if(projeto){
    	 url += '&projeto=' + projeto; 
    	}

    	location.href = url;
	}
</script>
<script type="text/javascript">
	
      google.load("visualization", "1", {packages:["corechart"]});

     google.setOnLoadCallback(drawChart);

      function drawChart() {
    	  tSaldo = 0;
 		  tVerba = 0;
 		  tGasto = 0;

          //Calculo dos totais
    	 	 $.each($('.saldo-total'), function(index, value){
    	 		tSaldo += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 	 });

    	 	$.each($('.verba-total'), function(index, value){
    	 		tVerba += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
   	 		 });

    	 	$.each($('.gasto-total'), function(index, value){
       	 	 tGasto += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
   	 	 	});

   	 	 //Calculo do financeiro do custeio
    		cSaldo =0, cVerba = 0, cGasto = 0;
    		 $.each($('.saldo-custeio'), function(index, value){
     	 		cSaldo += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
     	 	 });

     	 	$.each($('.verba-custeio'), function(index, value){
     	 		cVerba += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 		 });

     	 	$.each($('.gasto-custeio'), function(index, value){
        	 	 cGasto += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 	 	});

     	 	 //Calculo do financeiro do capital
    		caSaldo =0, caVerba = 0, caGasto = 0;
    		 $.each($('.saldo-capital'), function(index, value){
     	 		caSaldo += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
     	 	 });

     	 	$.each($('.verba-capital'), function(index, value){
     	 		caVerba += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 		 });

     	 	$.each($('.gasto-capital'), function(index, value){
        	 	 caGasto += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 	 	});

     	 //Calculo do financeiro das bolsas
    		bSaldo = 0, bVerba = 0, bGasto = 0;
    		 $.each($('.saldo-bolsa'), function(index, value){
     	 		bSaldo += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
     	 	 });

     	 	$.each($('.verba-bolsa'), function(index, value){
     	 		bVerba += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 		 });

     	 	$.each($('.gasto-bolsa'), function(index, value){
        	 	 bGasto += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 	 	});

     	 	 //Calculo do financeiro das bolsas
    		oSaldo = 0, oVerba = 0, oGasto = 0;
    		 $.each($('.saldo-outros'), function(index, value){
     	 		oSaldo += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
     	 	 });

     	 	$.each($('.verba-outros'), function(index, value){
     	 		oVerba += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 		 });

     	 	$.each($('.gasto-outros'), function(index, value){
        	 	 oGasto += parseFloat(value.innerHTML.substring(0,value.innerHTML.length - 3).replace('.',''));
    	 	 	});
    		
    			
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Controle Financeiro');
        data.addColumn('number', 'Orçamentado');
        data.addColumn('number', 'Gasto');
        data.addColumn('number', 'Saldo');

        data.addRows(5);

		//Adiciona os Totais
        data.setValue(4, 0, 'Total');
        data.setValue(4, 1, tVerba);
        data.setValue(4, 2, tGasto);
        data.setValue(4, 3, tSaldo);

        //Adiciona o Custeio
        data.setValue(0, 0, 'Custeio');
        data.setValue(0, 1, cVerba);
        data.setValue(0, 2, cGasto);
        data.setValue(0, 3, cSaldo);

      //Adiciona o Capital
        data.setValue(1, 0, 'Capital');
        data.setValue(1, 1, caVerba);
        data.setValue(1, 2, caGasto);
        data.setValue(1, 3, caSaldo);

        //Adiciona as Bolsas
        data.setValue(2, 0, 'Bolsas');
        data.setValue(2, 1, bVerba);
        data.setValue(2, 2, bGasto);
        data.setValue(2, 3, bSaldo);

      	//Adiciona gastos Diveros "OUTROS"
        data.setValue(3, 0, 'Outros');
        data.setValue(3, 1, oVerba);
        data.setValue(3, 2, oGasto);
        data.setValue(3, 3, oSaldo);
        

        
        var formatter = new google.visualization.NumberFormat(
        	      {prefix: 'R$ ', negativeColor: 'red', negativeParens: true});
  	  			formatter.format(data, 1); 
        	  	formatter.format(data, 2); 
        	  	formatter.format(data, 3); 


        var chart = new google.visualization.ColumnChart(document.getElementById('chart_atividades'));

		
		var chartOptions = {width: 600, height: 350, title: 'Atividades',
				colors: ['green', 'red', 'blue'],
              //  hAxis: {title: 'Atividades', titleTextStyle: {color: 'blue'}},
                vAxis: {title: 'Valores em R$', titleTextStyle: {color: 'red'}},
                hAxis: {title: 'Tipo de Verba', titleTextStyle: {color: 'red'}},
                legend: 'top'
                
               };

		//Desenha o chart.
        chart.draw(data, chartOptions);

      }
 </script>
<?php
$this->breadcrumbs=array(
	'Relatório de Projetos',
);

$this->menu=array(
	array('label'=>'Relatório de Atividades', 'url'=>array('atividade')),
	array('label'=>'Relatório de Projetos', 'url'=>array('projeto')),
);
?>

<h1>Relatório de Projetos</h1>

<div class="row">
<label><b>Ínicio</b></label>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'inicio',
				'value'=>isset($inicio) ? $inicio : null,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop',),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
 -
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'name'=>'termino',
				'value'=>isset($termino) ? $termino : null,
				'language'=>'pt-BR',
			    // additional javascript options for the date picker plugin
    			'options'=>array('showAnim'=>'drop',),
			    'htmlOptions'=>array('style'=>'height:15px;'),));
		?>
<label><b>Término</b></label>
</div>
<br>

<div class="row">
<?php echo CHtml::dropDownList('dropDownProjeto',$projeto,CHtml::listData(Projeto::model()->findAll(array('order'=>'nome')), 'cod_projeto', 'nome'), array('prompt'=>"Escolha um Projeto",));?>
</div>
		
<?php echo CHtml::submitButton('Limpar', array('id'=>'btnLimpar', 'submit'=>'relatorio'));?>
<?php echo CHtml::submitButton('Enviar', array('id'=>'btnEnviar', 'onclick'=>'filtraAtividade();'));?>

<br>
<div class="view" id="chart_atividades"></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_projeto',
	'sortableAttributes'=>array(
     'data_inicio', 'data_fim',),
)); ?>



