<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController{
    
    public $components = array('Paginator');
    public $paginate = array(
        'conditions' => array(),
        'limit' => 20,
        'order' => array(
            'Categoria.id' => 'asc',
        ), 
        'class' => 'class="pagination'
    );

    public function index(){
        
        $this->Paginator->settings = $this->paginate;
        $dados = $this->Paginator->paginate('Categoria');
        $this->set('dados', $dados);
    }
    
    public function add(){

        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->Categoria->create(); 

            if ($this->Categoria->save($this->request->data)) {
                $this->Flash->success(__('Categoria de produto cadastrada com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->success(__('Categoria não cadastrada com sucesso')); 
        }
    }
    
    public function edit($id=null){

        if($this->request->is(array('put', 'post'))){
            
            if($this->Categoria->save($this->request->data)){
                $this->Flash->success(__('Categoria editada com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Flash->success(__('A categoria não pode modificado'));
        }

        $this->request->data = $this->Categoria->findById($id);
        }
        
    public function delete($id = null) {

        if(!$this->request->is('post')){
            
            $this->Categoria->delete($id);
            $this->Flash->success('A caegoria com id: ' . $id . ' foi deletada.');
            $this->redirect(array('action' => 'index'));

        }    
}
}

