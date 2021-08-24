<?php

echo $this->Html->tag('h1', 'Editar produto');

echo $this->Form->create('Produto', array('label' => 'Produto'));
echo $this->Form->hidden('id');
echo $this->Form->input('nome', array('label' => 'Produto', 'required' => false)); 
echo $this->Form->input('descricao', array('label' => 'Descrição'));
echo $this->Form->input('qtd', array('label' => 'Quantidade', 'required' => false));
echo $this->Form->input('preco', array('label' => 'Preço'));
echo $this->Form->input('categoria_id', array(
    'label' => 'Categoria', 
    'type' => 'select',
    'options'=> $lista_categoria
));
echo $this->Form->input('status', array('label' => 'Status'));
echo $this->Form->submit('Cadastrar', array('validate' => true));
echo $this->Form->end();

echo $this->Html->link(__('Voltar'), ['action' => 'index']);

