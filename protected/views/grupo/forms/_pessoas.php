<?php /* @var PermissaoPessoaForm $pessoa */ ?>
<h4>Permissões da Página de Pessoas</h4>
<div class="input">
	<?php echo $form->labelEx($pessoa,'informacoes'); ?>
	<?php echo $form->dropDownList($pessoa, 'informacoes', Grupo::defaultPermitions());?>
	<?php echo $form->error($pessoa,'informacoes'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($pessoa,'atividades'); ?>
	<?php echo $form->dropDownList($pessoa, 'atividades', Grupo::defaultPermitions());?>
	<?php echo $form->error($pessoa,'atividades'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($pessoa,'financeiro'); ?>
	<?php echo $form->dropDownList($pessoa, 'financeiro', Grupo::defaultPermitions());?>
	<?php echo $form->error($pessoa,'financeiro'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($pessoa,'deletar'); ?>
	<?php echo $form->dropDownList($pessoa, 'deletar', Grupo::deletePermitions());?>
	<?php echo $form->error($pessoa,'deletar'); ?>
</div>
