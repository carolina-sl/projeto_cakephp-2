<?php

App::uses('AppModel', 'Model');

class Venda extends AppModel{
    
    public $name = 'Venda';
    public $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'conditions' => array(),
            'foreignKey' => 'cliente_id'
        )
    );
}
