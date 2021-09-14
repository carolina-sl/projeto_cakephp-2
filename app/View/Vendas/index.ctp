<?php

echo $this->Html->tag('h1', 'Lista de vendas');
$colunas = array('id', 'Cliente', 'Data da venda', 'Valor total', 'Vendedor','tipo de pagamento');

$list_vendas = array();
foreach ($dados as $dado) {
    $list_vendas[] = array(
        $dado['Venda']['id'],
        $dado['Cliente']['nome'],
        $dado['Venda']['data_venda'],
        $dado['Venda']['valor_total'],
        $dado['Venda']['vendedor'],
        $dado['Venda']['tipo_pagamento']);
    
}

$body = $this->Html->tableCells($list_vendas);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($colunas), array('class' => 'thead-light'));

echo $this->Html->tag('table', $header . $body);

