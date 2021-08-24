<?php

echo $this->Html->tag('h1', 'Lista de clientes');
$colunas = array('id', 'Nome', 'Gênero', 'E-mail', 'cpf','Ações');

$list_clientes = array();
foreach ($dados as $dado) {
    $list_clientes[] = array(
        $dado['Cliente']['id'],
        $dado['Cliente']['nome'],
        $dado['Cliente']['sexo'],
        $dado['Cliente']['email'],
        $dado['Cliente']['cpf'],
        $this->Html->link('Ver',  array('controller' => 'clientes', 'action' => 'ver', $dado['Cliente']['id'])),
        $this->Html->link('Editar',  array('controller' => 'clientes', 'action' => 'edit', $dado['Cliente']['id'],'update' => '#content')),
        $this->Html->link('Excluir',  array('controller' => 'clientes', 'action' => 'delete', $dado['Cliente']['id']), 
                array('onclick'=>"return confirm('Tem certeza que deseja deletar o cliente?')"))
    );
 
}
$body = $this->Html->tableCells($list_clientes);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($colunas), array('class' => 'thead-light'));

echo $this->Html->tag('table', $header . $body);
echo $this->Html->link(__('Cadastrar Cliente'), ['action' => 'add']);
echo '<br>';
echo $this->Html->link(__('Sair'), ['controller' => 'users','action' => 'logout']);

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

debug($lista_venda_cliente);