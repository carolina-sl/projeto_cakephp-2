<?php

echo $this->Html->tag('h1', 'Login');
echo $this->Session->flash('auth');
echo $this->Form->create('User', array('label' => 'User'));
echo $this->Form->input('username', array('label' => 'Usuário', 'required' => false));
echo $this->Form->input('password', array('label' => 'Senha', 'required' => false));

echo $this->Form->end(__('Entrar') , array('validate' => true));

echo $this->Html->link(__('Cadastrar Usuário'), ['action' => 'add']);

