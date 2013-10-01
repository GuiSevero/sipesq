<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse main-menu">
            <ul class="nav">
              <li class="<?php echo ($this->activeMenu=='SIPESQ') ? 'active' : ''?>">
              	<a href="<?php echo $this->createUrl('/site/index')?>">SIPESQ</a>
              </li>
              <li class="<?php echo ($this->activeMenu=='Projetos') ? 'active' : ''?>">
              	<a href="<?php echo $this->createUrl('/projeto')?>">Projetos</a>
              </li>
              <li class="<?php echo ($this->activeMenu=='Pessoas') ? 'active' : ''?>">
              	<a href="<?php echo $this->createUrl('/pessoa')?>">Pessoas</a>
              </li>
              <li class="<?php echo ($this->activeMenu=='Atividades') ? 'active' : ''?>">
              	<a href="<?php echo $this->createUrl('/atividade')?>">Atividades</a>
              </li>
              <li class="dropdown <?php echo ($this->activeMenu=='Acervo') ? 'active' : ''?>" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acervo <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $this->createUrl('/agenda')?>"><i class="icon icon-calendar"></i> Agenda</a></li>
                  <li><a href="<?php echo $this->createUrl('/livro')?>"><i class="icon icon-book"></i> Livros</a></li>
                  <li><a href="<?php echo $this->createUrl('/contato')?>"><i class="icon icon-envelope"></i> Contatos</a></li>
                  <li><a href="<?php echo $this->createUrl('/site/mediawiki')?>"><i class="icon icon-file"></i> Media Wiki</a></li>
                  <li><a href="<?php echo $this->createUrl('/subscription')?>"><i class="icon icon-pencil"></i> Subscriptions</a></li>                  
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-user icon-white"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header"><?php echo Yii::app()->user->name?></li>
                  <li><a href="<?php echo $this->createUrl('/pessoa/myself')?>"><i class="icon icon-user"></i> Perfil</a></li>
                  <!-- <li class="nav-header"></li> -->
                  <li><a href="<?php echo $this->createUrl('/projeto')?>"><i class="icon icon-briefcase"></i> Projetos</a></li>
                  <li><a href="<?php echo $this->createUrl('/atividade')?>"><i class="icon icon-tasks"></i> Atividades</a></li>                   
                  <li class="divider"></li>
                  <li><a href="<?php echo $this->createUrl('/site/logout')?>"><i class="icon icon-ban-circle"></i> Sair</a></li>
                </ul>
              </li>
              
            </ul>
            <?php if(Sipesq::isSupport()) $this->renderPartial('/layouts/menu/_menu_suporte');?>
            <?php $this->renderPartial("/layouts/menu/_search_form")?>
            <?php if(count($this->menu) > 0) $this->renderPartial('/layouts/menu/_menu_acoes');?>
          </div><!--/.nav-collapse -->
        </div><!-- /container -->
      </div>
</div>