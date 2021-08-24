<?php

echo $this->Html->tag('h1', 'Lista de Usuários');
$colunas = array('id', 'Nome','Username', 'E-mail', 'Data de cadastro', 'Ações');

$list_usuarios = [];
foreach ($dados as $dado){
    $list_usuarios[] = array(
        $dado['User']['id'],
        $dado['User']['name'],
        $dado['User']['username'],
        $dado['User']['email'],
        date("d/m/Y H:i:s", strtotime($dado['User']['created'])),
        $this->Html->link('Ver',  array('controller' => 'users', 'action' => 'ver', $dado['User']['id'])),
        $this->Html->link('Editar',  array('controller' => 'users', 'action' => 'edit', $dado['User']['id'],'update' => '#content')),
        $this->Html->link('Excluir',  array('controller' => 'users', 'action' => 'delete', $dado['User']['id']), 
                array('onclick'=>"return confirm('Tem certeza que deseja deletar esse usuário?')"))
    );
}   
$body = $this->Html->tableCells($list_usuarios);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($colunas), array('class' => 'thead-light'));

echo $this->Html->tag('table', $header . $body);
echo $this->Html->link(__('Cadastrar Usuário'), ['action' => 'add']);
echo '<br>';
echo $this->Html->link(__('Sair'), ['action' => 'logout']);

echo '<br>';
echo '<br>';

echo $this->Paginator->first(' Primeira ', null, null, array('class' => 'page-link'));
echo $this->Paginator->prev(' << Anterior ', null, null, array('class' => 'disable'));
echo $this->Paginator->numbers();
echo $this->Paginator->next(' Próximo >>', null, null, array('class' => 'disable'));
echo $this->Paginator->last(' Ultima ', null, null, array('class' => 'disable'));
echo '<br>';
echo '<br>';
echo $this->Html->para( '', $this->Paginator->counter(
        'Página {:page} de {:pages}, mostrando {:current} registros de '
           . '{:count} total, começando no registro {:start}, terminando em {:end}'
         ));
     

