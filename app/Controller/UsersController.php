<?php

class UsersController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add', 'logout','mentorSkill');
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

 public function mentorSkill($id,$status='hide')
 {
 	$this->set('id',$id);
 	if ($status!='show')
 	{
	 	$result = $this->User->find('first',array('conditions'=>array('id'=>$id)));
	 	$this->request->data['User']['id'] = $id;
	 	if ($this->User->save($this->request->data))
	 	{
	            //$this->Session->setFlash('Info Saved!');
	 			$wordList = explode(',', $this->request->data['User']['skills']);
	 			$data = array();
	 			foreach ($wordList as $Word)
	 			{
	 				$Word = trim($Word);
	 				$Word = stripslashes($Word);
	 				$data[] = array('name'=>$Word,'user_id'=>$id);
	 			}
	 			$this->User->Skill->saveMany($data);

	            return $this->redirect('/');
	 	}
 	}
}

 public function add()
 {
        if ($this->request->is('post'))
        {
            $this->User->create();
            if ($this->User->save($this->request->data))
            {
            	$id = $this->User->getLastInsertId();
            	$this->request->data['User']['id'] = $id;
            	$this->Auth->login($this->request->data['User']);

                if($this->request->data['User']['role']=='mentor')
                {
                	$this->autoRender = false;
                	$this->redirect(array('controller'=>'Users','action'=>'mentorSkill/'.$id.'/show'));
                }
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function dashboard()
    {
    	$this->set('userRole',0);
    }


}

?>