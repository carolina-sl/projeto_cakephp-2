<?php

App::uses('AppController', 'Controller');

class ClientesController extends AppController{
    
    public $components = array('Paginator');
    public $paginate = array(
        'conditions' => array(),
        'limit' => 20, 
        'class' => 'class="pagination'
    );
    
    public function index(){
        $this->loadModel('Venda');
        
        $this->Paginator->settings = $this->paginate;
        $dados = $this->Paginator->paginate('Cliente');
        $this->set('dados', $dados);

        $lista_venda_cliente = $this->Venda->Cliente->find('all');
        $this->set('lista_venda_cliente', $lista_venda_cliente);
    }
    
    public function add(){

        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->Cliente->create(); 

            if ($this->Cliente->save($this->request->data)) {
                $this->Flash->success(__('Cliente cadastrado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->success(__('Cliente não cadastrado com sucesso')); 
        }
    }

    public function edit($id=null){

        if($this->request->is(array('put', 'post'))){
            
            if($this->Cliente->save($this->request->data)){
                $this->Flash->success(__('Cliente editado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Flash->success(__('Cliente não pode modificado'));
        }

        $this->request->data = $this->Cliente->findById($id);
    }
        
    public function delete($id = null) {

        if(!$this->request->is('post')){
            
            $this->Cliente->delete($id);
            $this->Flash->success('O cliente com id: ' . $id . ' foi deletado.');
            $this->redirect(array('action' => 'index'));

        }    
}

    public function ver($id = null) {

        $dado = $this->Cliente->findById($id); 
        $this->set(compact('dado'));
        
       }
    
}
