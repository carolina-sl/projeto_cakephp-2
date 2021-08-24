<?php

App::uses('AppModel', 'Model');

class Produto extends AppModel{

    public $name = 'Produto';
    public $belongsTo = array(
        'Categoria' => array(
            'className' => 'Categoria',
            'foreignKey' => 'categoria_id'
        )
    );
    public $validate = array(
            'nome' => array(
                'rule' => 'notBlank',
                'message' => 'O campo nome não pode ser nulo'
            ),
            'qtd' => array(
                'rule' =>'notBlank',
                'message' => 'Digite a quantidade do produto'
            )
        );

}
