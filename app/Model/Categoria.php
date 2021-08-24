<?php

App::uses('AppModel', 'Model');

class Categoria extends AppModel{

    public $name = 'Categoria';
    public $validate = array(
        'nome' => array(
                'rule' => 'notBlank',
                'message' => 'Preencha o campo corretamente.'
            )
    );
}
