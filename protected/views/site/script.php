


<div class="row">

<?php $this->beginWidget('CMarkdown', array('purifyOutput'=>false));?>


### Passos
1. atualizar a lista de emails do sipesq na cláusula WHERE
2. rodar script na base do cegov
3. substituir no resultado
        * "INSERT por INSERT
        * ');" por ');
        * 'NULL' por NULL
4. rodar resultado no sipesq.

> COM ISSO, TODAS PESSOAS DO SITE DO CEGOV QUE NÃO POSSUEM O SEU EMAIL CADASTRADO NO SIPESQ, SÃO INSERIDAS.
> Insere todas pessoas do site do CEGOV que não possuem o mesmo email.

select 'INSERT INTO pessoa ( <br>
                nome, <br>
                nome_mae,<br>
                telefone,<br>
                cpf,<br>
                rg,<br>
                cartao_ufrgs,<br>
                email,<br>
                lattes,<br>
                data_nascimento,<br>
                equipe_atual,<br>
                login,<br>
                password,<br>
                nivel_acesso,<br>
                first_login,<br>
                curso,<br>
		endereco_residencial,<br>
		orgao_expedidor,<br>
		orgao_departamento,	<br>	
		old_cod_pessoa,<br>
		instituicao<br>
)<br>
        VALUES (<br>
        '''||COALESCE(replace(nome, '''', ''''''), '''''')||''',<br>
        '''||COALESCE(replace(nome_mae, '''', ''''''), '')||''',<br>
        '''||COALESCE(replace(telefone, '''', ''''''), '') || ' - ' || COALESCE(replace(celular, '''', ''''''), '''''')||''',<br>
        '''||COALESCE(replace("CPF", '''', ''''''), '')||''',<br>
        '''||COALESCE(replace("RG", '''', ''''''), '')||''',<br>
        '''||COALESCE(replace(cartao_ufrgs, '''', ''''''), '')||''',<br>
        '''||COALESCE(replace(email, '''', ''''''), '')||''',<br>
        '''||COALESCE(replace(lattes, '''', ''''''), '')||''',<br>
        '''||COALESCE(data_nascimento, 'NULL')||''',<br>
        '||TRUE||',<br>
        '''||COALESCE(replace(email, '''', ''''''), '')||''',<br>
        '''||COALESCE(senha, '')||''',<br>
        0,<br>
        '''||COALESCE(first_login, 'TRUE')||''',<br>
        '''||COALESCE(replace(curso, '''', ''''''), '')||''',<br>
        '''||COALESCE(replace(endereco_residencial, '''', ''''''), '')||''',<br>
	'''||COALESCE(replace(orgao_expedidor, '''', ''''''), '')||''',<br>
	'''||COALESCE(replace(orgao_departamento, '''', ''''''), '')||''',<br>
	'''||COALESCE(cod_pessoa, 0)||''',<br>
	'''||COALESCE(replace(instituicao, '''', ''''''), '')||''');' as script<br>
from pessoa<br>
where email not in -- atualizar aqui ao rodar...<br>
(<br>
	<?php echo implode(', ', $emails) ?><br>
)<br>

<?php $this->endWidget();?>
</div>
