<?php

echo $this->Html->tag('h1', 'Cadastro de Usuário');

echo $this->Form->create('User', array('label' => 'User'));
echo $this->Form->input('name', array('label' => 'Nome', 'required' => false)); 
echo $this->Form->input('username', array('label' => 'Username', 'required' => false));
echo $this->Form->input('email', array('label' => 'E-mail'));
echo $this->Form->input('password', array('label' => 'Senha', 'required' => false));

echo $this->Form->submit('Cadastrar', array('validate' => true));
echo $this->Form->end();
echo $this->Html->link(__('Voltar'), ['action' => 'index']);
