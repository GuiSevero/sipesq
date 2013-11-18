<?php 

    foreach(Projeto::$momentos as $key=>$momento){
        echo $key .' - ' .$momento;
        echo $criteria->condition;
        $criteria->condition('situacao = '.$key);
        $projetos = Projeto::model()->findAll($criteria);
        echo "<h3>" .$momento ."</h3>";
        $this->renderPartial('projetos', array('projetos'=>$projetos));
        echo "<hr>";
    }

?>


