<?php

App::uses('AppController', 'Controller');

class ProdutosController extends AppController{
    
    public $components = array('Paginator');
    public $paginate = array(
        'conditions' => array(),
        'limit' => 20,
        'order' => array(
            'Produto.id' => 'asc',
        ), 
        'class' => 'class="pagination'
    );

    public function index(){

        $this->Paginator->settings = $this->paginate;
        $dados = $this->Paginator->paginate('Produto');
        $this->set('dados', $dados);

        $lista_categoria = $this->Produto->Categoria->find('all');
        $this->set('lista_categoria', $lista_categoria);
    }
    
    public function add(){

        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->Produto->create(); 

            if ($this->Produto->save($this->request->data)) {
                $this->Flash->success(__('Produto cadastrado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->success(__('Produto não cadastrado com sucesso')); 
        }
        $fields = array('Categoria.id', 'Categoria.nome');
        $lista_categoria = $this->Produto->Categoria->find('list', compact('fields'));
        $this->set('lista_categoria', $lista_categoria);
    }

    public function edit($id=null){

        if($this->request->is(array('put', 'post'))){
            
            if($this->Produto->save($this->request->data)){
                $this->Flash->success(__('Produto editado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Flash->success(__('Produto não pode modificado'));
        }

        $this->request->data = $this->Produto->findById($id);
        
        $fields = array('Categoria.id', 'Categoria.nome');
        $lista_categoria = $this->Produto->Categoria->find('list', compact('fields'));
        $this->set('lista_categoria', $lista_categoria);

    }
        
    public function delete($id = null) {

        if(!$this->request->is('post')){
            
            $this->Produto->delete($id);
            $this->Flash->success('O produto com id: ' . $id . ' foi deletado.');
            $this->redirect(array('action' => 'index'));

        }    
}

    public function ver($id = null) {

        $dado = $this->Produto->findById($id); 
        $this->set(compact('dado'));
        
       }
}




