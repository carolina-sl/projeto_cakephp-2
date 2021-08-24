<?php
    App::uses('AppController', 'Controller');
    
class UsersController extends AppController {
    
    public $components = array('Paginator');
    public $paginate = array(
        'conditions' => array(),
        'limit' => 20,
        'order' => array(
            'User.id' => 'asc',
        ), 
        'class' => 'class="pagination'
    );

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('logout', 'add');
    }
        
    public function index(){
        $this->Paginator->settings = $this->paginate;
        $dados = $this->Paginator->paginate('User');  
        $this->set('dados', $dados);
    }
    
    public function add(){

        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->User->create(); 

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->success(__('Usuário não cadastrado com sucesso')); 
        }
        
    }
    
    public function edit($id=null){

        if($this->request->is(array('put', 'post'))){
            
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('Usuário editado com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
                $this->Flash->success(__('Usuário não pode modificado'));
        }
        $this->request->data = $this->User->findById($id);
    }
        
    public function delete($id = null) {

        if(!$this->request->is('post')){
            
            $this->User->delete($id);
            $this->Flash->success('O usuário com id: ' . $id . ' foi deletado.');
            $this->redirect(array('action' => 'index'));

        }     
    }
    
    public function ver($id = null) {
        $dado = $this->User->findById($id); 
        $this->set(compact('dado'));
       }
       
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(
                __('Senha ou usuario incorretos.')
            );
          }
       }
        
    public function logout() {
       $this->redirect($this->Auth->logout());
        }
    }
    
    
    
  
