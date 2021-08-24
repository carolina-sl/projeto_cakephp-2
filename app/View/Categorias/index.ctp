<?php

echo $this->Html->tag('h1', 'Lista de categorias');

$colunas = array('id', 'nome', 'Ações');

$list_categorias = array();

foreach ($dados as $dado) {
    $list_categorias[] = array(
        $dado['Categoria']['id'],
        $dado['Categoria']['nome'],
        $dado['Categoria']['produto_id'],
        $this->Html->link('Editar',  array('controller' => 'categorias', 'action' => 'edit', $dado['Categoria']['id'],'update' => '#content')),
        $this->Html->link('Excluir',  array('controller' => 'categorias', 'action' => 'delete', $dado['Categoria']['id']), 
                array('onclick'=>"return confirm('Tem certeza que deseja deletar esta categoria?')"))
    );
}

$body = $this->Html->tableCells($list_categorias);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($colunas), array('class' => 'thead-light'));
echo $this->Html->tag('table', $header . $body);
echo $this->Html->link(__('Cadastrar Categoria'), ['action' => 'add']);
echo '<br>';
echo $this->Html->link(__('Sair'), ['controller' => 'users','action' => 'logout']);

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
