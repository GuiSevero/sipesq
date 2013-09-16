<?php /* @var PermissaoAtividadeForm $acervo */?>
<h4>Permissões da Página de Acervo</h4>
<div class="input">
	<?php echo $form->labelEx($acervo,'links'); ?>
	<?php echo $form->dropDownList($acervo, 'links', Grupo::defaultPermitions());?>
	<?php echo $form->error($acervo,'links'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($acervo,'subscriptions'); ?>
	<?php echo $form->dropDownList($acervo, 'subscriptions', Grupo::defaultPermitions());?>
	<?php echo $form->error($acervo,'subscriptions'); ?>
</div>

<div class="input">
	<?php echo $form->labelEx($acervo,'contatos'); ?>
	<?php echo $form->dropDownList($acervo, 'contatos', Grupo::defaultPermitions());?>
	<?php echo $form->error($acervo,'contatos'); ?>
</div>