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
        //	$this->set('enteredEmail',$this->request->data['User']['email']);
		//	$this->set('enteredPassword',$this->request->data['User']['password']);
    
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
                else
                {
                	$this->redirect('/users/dashboard');
                }	
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function dashboard()
    {
    	

    	$this->set('userRole',$this->Session->read('Auth.User.role'));
    	if($this->Session->read('Auth.User.role')=='mentee')
    	{
        $post = $this->User->Post->find('first',array('conditions'=>array('Post.active'=>1,'Post.user_id'=>$this->Session->read('Auth.User.id'))));
        $this->set('myPdp',$this->User->Post->find('first',array('conditions'=>array('Post.active'=>1,'Post.user_id'=>$this->Session->read('Auth.User.id')))));
        if(count($post) > 0){
            $this->set('messages',$this->User->Post->Message->find('all',array('conditions'=>array('post_id'=>$post['Post']['id']),'limit'=>10)));
        }
    	}
    	else
    	if($this->Session->read('Auth.User.role')=='mentor')
    	{
    		$this->recursive =2;
    		$this->set('myMentees',$this->User->Post->find('all',array('conditions'=>array('Post.active' => 1, 'Post.mentor_id'=>$this->Session->read('Auth.User.id')))));

    		if($this->request->is('post'))
    	{
    		$searchTerm = $_POST['search'];
    		$query = "SELECT *  FROM `posts` WHERE `description` LIKE '".$searchTerm."' OR `objective` LIKE '".$searchTerm."'";
    		$this->User->query($query);
            	$result = $this->User->query($query);
            	$this->set('recPosts',$result);
    	}
    	else
    	{
    	$query = "select count(*),post_id,p.* from keywords as k inner join posts as p on k.post_id =p.id  where k.word in (select name from skills where user_id = ".$this->Session->read('Auth.User.id').") group by k.post_id order by count(*) Desc LIMIT 10";
            	$result = $this->User->query($query);
            	$this->set('recPosts',$result);
        }
    	}
    }

}

?>