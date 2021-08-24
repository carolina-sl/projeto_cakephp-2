<?php

echo $this->Html->tag('h1', 'Editar categoria');

echo $this->Form->create('Categoria', array('label' => 'Categoria'));
echo $this->Form->hidden('id');
echo $this->Form->input('nome', array('label' => 'Categoria', 'required'=>false)); 
echo $this->Form->submit('Cadastrar', array('validate' => true));
echo $this->Form->end();

echo $this->Html->link(__('Voltar'), ['action' => 'index']);
