<h4>Permissões</h4>
<div class="tabbable tabs-left"
	style="min-height: 450px;">
	<ul class="nav nav-tabs" id="permTab">
		<li class="active"><a href="#atividade" data-toggle="tab">Página de
				Atividades</a></li>
		<li><a href="#pessoa" data-toggle="tab">Página de Pessoas</a></li>
		<li><a href="#projeto" data-toggle="tab">Página de Projetos</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="atividade">
			<?php $this->renderPartial("/grupo/forms/_atividades", array('form'=>$form, 'atividade'=>$model->atividade))?>
		</div>
		<!-- /atividade -->

		<div class="tab-pane" id="pessoa">
			<?php $this->renderPartial("/grupo/forms/_pessoas", array('form'=>$form, 'pessoa'=>$model->pessoa))?>
		</div>
		<!-- /pessoa -->

		<div class="tab-pane" id="projeto">
			<?php $this->renderPartial("/grupo/forms/_projetos", array('form'=>$form, 'projeto'=>$model->projeto))?>
		</div>

	</div>
	<!-- /tab-content -->
</div>
