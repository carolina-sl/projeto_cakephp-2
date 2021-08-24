<?php

echo $this->Html->tag('h1', 'Cadastro de Categoria');

echo $this->Form->create('Categoria', array('label' => 'Categoria'));
echo $this->Form->input('nome', array('label' => 'Categoria', 'required' => false)); 
echo $this->Form->submit('Cadastrar', array('validate' => true));
echo $this->Form->end();

echo $this->Html->link(__('Voltar'), ['action' => 'index']);
