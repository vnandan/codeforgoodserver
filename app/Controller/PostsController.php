<?php

class PostsController extends AppController {
    public function index() {
        //$users = $this->User->find('all');
        //$this->set('users', $users);
    }

    public function add()
    {
    	 if ($this->request->is('post'))
        {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Session->read('Auth.User.id');
            if ($this->Post->save($this->request->data))
            {
            	$this->Session->setFlash(__('Question created!'));
            	return $this->redirect('/users/dashboard');
            }
            $this->Session->setFlash(__('The information could not be saved. Please, try again.'));
        }
    }
}

?>