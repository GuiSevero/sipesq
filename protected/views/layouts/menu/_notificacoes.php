<?php Yii::app()->clientScript->registerCss('label',"
        .notif-content{
          padding: 2px;
          font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
          font-size: 11px;
          line-height: 14px;
          min-width: 250px;
          white-space: pre-line;

        }
        .ntf{
          border-bottom: solid 1px #CCC;
        }
        .notif-new{
          background-color: #DDD;

        }

"); 


if(!isset($notificacoes)){

$params = array();
		$command =  Yii::app()->db->createCommand();
		$select = array(
					'notf_id'
				,	'message'
				,	'read'
				,	'url'
				,	'time'				
		);
		$command->from('notificacao');
		$command->params = array('receiver'=>Yii::app()->user->getId());
		$command->where = "receiver = :receiver";
		$command->select = implode(', ', $select);
		$command->order = 'time DESC';
		$command->limit(10);
		$notificacoes = $command->queryAll();

}

?>

<li class="dropdown" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notificações <span class="badge badge-warning">2</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php foreach($notificacoes as $ntf): ?>
                	<li class="ntf <?php echo ($ntf['read'] == true) ? '' : 'notif-new'; ?>">
                    <a href="<?php echo $this->createUrl('/notificacao/view', array('id'=>$ntf['notf_id'])); ?>">
                    <div class="notif-content">
                       <?php echo $ntf['message']; ?>
                    </div>
                    </a>
                  </li>
            	<?php endforeach; ?>
            	<?php /*
                  <li class="ntf notif-new">
                    <a href="<?php echo $this->createUrl('/agenda')?>">
                    <div class="notif-content">
                       <b>Guilherme Severo</b> adicionou uma atividade para você.
                    </div>
                    </a>
                  </li>
                  <li class="ntf" >
                    <a href="<?php echo $this->createUrl('/agenda')?>">
                    <div class="notif-content">
                       <b>Eduardo Bueno</b> adicionou você no projeto <b>Atlas de Segurança Internacional</b>. 
                    </div>
                    </a>
                  </li>
                  <li class="ntf">
                    <a href="<?php echo $this->createUrl('/agenda')?>">
                    <div class="notif-content">
                       <b>Marco Cepik</b> adicionou um passo para você na atividade <b>Reunião com conselho científico do CEGOV</b>.
                    </div>
                    </a>
                  </li>
                  <li class="ntf notif-new">
                    <a href="<?php echo $this->createUrl('/agenda')?>">
                    <div class="notif-content">
                       <b>Gustavo Moller </b> atualizou a atividade <b>Reunião com conselho científico do CEGOV</b> e também atualizou a atividade <b>Reunião com conselho científico da UFRGS</b>
                    </div>
                    </a>
                  </li>
                  <li class="ntf">
                    <a href="<?php echo $this->createUrl('/agenda')?>">
                        <div class="notif-content">
                        <b>Guilherme Severo</b> atualizou o projeto <b>Atlas de Segurança Internacional</b>. 
                       </div>
                    </a>
                  </li>
                  */?>
                </ul>
              </li>