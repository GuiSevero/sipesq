window.onload = function(){
  $.each($('.bar_chart'), function(k, container){
      drawChart(container);
     
   });

};

  function drawChart(container) {

          $(container).attr('height', '280').attr('width', '1000');
          var rubrica  = $(container).attr("data-rubrica")
          , orcamentado = parseFloat($(container).attr("data-orcamentado"))
          , recebido = parseFloat($(container).attr("data-recebido"))
          , gasto_comprometido = parseFloat($(container).attr("data-gasto-comprometido"))
          , gasto_corrente = parseFloat($(container).attr("data-gasto-corrente"))
          , saldo_disponivel = parseFloat($(container).attr("data-saldo-disponivel"))
          , saldo_corrente = parseFloat($(container).attr("data-saldo-corrente"))
          , verbaCompartilhada = $(container).attr("data-verba-compartilhada");

          var morrisOpts = {

            element: $(container).attr('id')
            , data: [
                  { rubrica: 'Orçamentado', valor: orcamentado, valor2: 200}
                , { rubrica: 'Recebido', valor: recebido}
                , { rubrica: 'Gastos Comprometidos', valor: gasto_comprometido}
                , { rubrica: 'Gastos Correntes', valor: gasto_corrente}
                , { rubrica: 'Saldo Disponível', valor: saldo_disponivel}
                , { rubrica: 'Saldo Corrente', valor: saldo_corrente}
              ]
            , xkey: 'rubrica'
            , ykeys: ['valor', 'valor2']
            , labels: ['Valor', 'Real']
            , gridTextFamily: "'Open Sans', Arial, Helvetica, sans-serif"
            , barColors: ['#25BA37', '#40C950', '#CC4523', '#E37768','#3E60CF','#5F7DDE']            

          };

          Morris.Bar(morrisOpts);
}