<?php

App::uses('AppModel', 'Model');

class Cliente extends AppModel{
    
    public $name = 'Cliente';
    public $hasOne = array(
        'Venda' => array(
            'className' => 'Venda',
            'foreignKey' => 'cliente_id'
        )
    );
}

