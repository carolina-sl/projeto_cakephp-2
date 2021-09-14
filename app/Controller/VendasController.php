<?php

App::uses('AppController', 'Controller');

class VendasController extends AppController{
    
     public $components = array('Paginator');
    public $paginate = array(
        'conditions' => array(),
        'limit' => 20, 
        'class' => 'class="pagination'
    );
    
    public function index(){
        
        $this->Paginator->settings = $this->paginate;
        $dados = $this->Paginator->paginate('Venda');
        $this->set('dados', $dados);

        $lista_clientes = $this->Venda->Cliente->find('all');
        $this->set('lista_clientes', $lista_clientes);
    
        
    }
    
}