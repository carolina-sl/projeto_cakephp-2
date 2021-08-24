<?php
    
    echo $this->Html->tag('h1', 'Detalhes do Usuário');
    
    $colunas = array('id', 'Nome', 'E-mail', 'Data de cadastro');
    $header = $this->Html->tableHeaders($colunas);
    
    $detalhar = array();
        $detalhar[] = array(
            $dado['User']['id'],
            $dado['User']['name'],
            $dado['User']['email'],
            date("d/m/Y H:i:s", strtotime($dado['User']['created'])),
        );

    $body = $this->Html->tableCells($detalhar);
    echo $this->Html->tag('table', $header . $body);
    echo $this->Html->link(__('Voltar'), ['action' => 'index']);
    
    echo $this->Html->css('forms');
    

