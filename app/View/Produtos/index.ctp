<?php

echo $this->Html->tag('h1', 'Lista de produtos');
$colunas = array('id', 'Nome', 'Descrição', 'Quantidade', 'Preço', 'Status', 'categoria', 'Ações');

$list_produtos = array();
foreach ($dados as $dado) {
    $list_produtos[] = array(
        $dado['Produto']['id'],
        $dado['Produto']['nome'],
        $dado['Produto']['descricao'],
        $dado['Produto']['qtd'],
        $dado['Produto']['preco'],
        $dado['Produto']['status'],
        $dado['Categoria']['nome'],
        $this->Html->link('Ver',  array('controller' => 'produtos', 'action' => 'ver', $dado['Produto']['id'])),
        $this->Html->link('Editar',  array('controller' => 'produtos', 'action' => 'edit', $dado['Produto']['id'],'update' => '#content')),
        $this->Html->link('Excluir',  array('controller' => 'produtos', 'action' => 'delete', $dado['Produto']['id']), 
                array('onclick'=>"return confirm('Tem certeza que deseja deletar o produto?')"))
    );
 
}
$body = $this->Html->tableCells($list_produtos);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($colunas), array('class' => 'thead-light'));

echo $this->Html->tag('table', $header . $body);
echo $this->Html->link(__('Cadastrar Produto'), ['action' => 'add']);
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