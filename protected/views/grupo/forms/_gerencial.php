<?php /* @var PermissaoAtividadeForm $gerencial 
"rubrica": 0
		,	"categoria_atividade":0
		,	"permissoes":0
		,	"relatorio":0
*
*/?>
<h4>Permissões da Página Gerencial</h4>
<div class="input">
	<?php echo $form->labelEx($gerencial,'rubricas'); ?>
	<?php echo $form->dropDownList($gerencial, 'rubricas', Grupo::defaultPermitions());?>
	<?php echo $form->error($gerencial,'rubricas'); ?>
</div>
<div class="input">
	<?php echo $form->labelEx($gerencial,'categoria_atividade'); ?>
	<?php echo $form->dropDownList($gerencial, 'categoria_atividade', Grupo::defaultPermitions());?>
	<?php echo $form->error($gerencial,'categoria_atividade'); ?>
</div>
<div class="input">
	<?php echo $form->labelEx($gerencial,'permissoes'); ?>
	<?php echo $form->dropDownList($gerencial, 'permissoes', Grupo::defaultPermitions());?>
	<?php echo $form->error($gerencial,'permissoes'); ?>
</div>
<div class="input">
	<?php echo $form->labelEx($gerencial,'relatorios'); ?>
	<?php echo $form->dropDownList($gerencial, 'relatorios', Grupo::defaultPermitions());?>
	<?php echo $form->error($gerencial,'relatorios'); ?>
</div>
