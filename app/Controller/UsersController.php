<?php

class UsersController extends AppController {

public $components = array(
    'Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('username' => 'email')
            )
        )
    )
);

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add', 'logout');
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        else
        {
        $result = $this->User->find('first',array('conditions'=>array('email'=>$this->request->data['User']['email'])));
        if(!$result)
        {
        	$this->redirect('/users/add');
        }
        else
        {
         $this->Session->setFlash(__('Invalid Password.'));
        }

    }
}
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

public function index() {
        $users = $this->User->find('all');
        $this->set('users', $users);
    }

 public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }


}

?>