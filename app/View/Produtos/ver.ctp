<?php
    
    echo $this->Html->tag('h1', 'Detalhes do produto');
    
    $colunas = array('Id', 'Nome', 'Descrição', 'Quantidade', 'Preço', 'Categoria');
    $header = $this->Html->tableHeaders($colunas);
    
    $detalhar = array();
  
        $detalhar[] = array(
            $dado['Produto']['id'],
            $dado['Produto']['nome'],
            $dado['Produto']['descricao'],
            $dado['Produto']['qtd'],
            $dado['Produto']['preco'],
            $dado['Categoria']['nome']
        
        );

    $body = $this->Html->tableCells($detalhar);
    echo $this->Html->tag('table', $header . $body);
    echo $this->Html->link(__('Voltar'), ['action' => 'index']);
    
    echo $this->Html->css('forms');
    

