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
            	$set1 = explode(',', $this->request->data['Post']['statement']);
            	$set2 = explode(',', $this->request->data['Post']['description']);

            	$refWords = array('MS excel');
            	
            	$mergeWords = array_merge($set1,$set2);

            	$set4 = array_intersect($mergeWords, $refWords)

            	$this->Session->setFlash(__('Question created!'));
            	return $this->redirect('/users/dashboard');
            }
            $this->Session->setFlash(__('The information could not be saved. Please, try again.'));
        }
    }
}

?>