<?php

echo $this->Html->tag('h1', 'Editar Cliente');

echo $this->Form->create('Cliente', array('label' => 'Cliente'));
echo $this->Form->hidden('id');
echo $this->Form->input('nome', array('label' => 'Cliente', 'required' => false)); 
echo $this->Form->input('sexo', array('label' => 'Gênero'));
echo $this->Form->input('email', array('label' => 'E-mail', 'required' => false));
echo $this->Form->input('cpf', array('label' => 'CPF'));
echo $this->Form->submit('Cadastrar', array('validate' => true));
echo $this->Form->end();

echo $this->Html->link(__('Voltar'), ['action' => 'index']);

