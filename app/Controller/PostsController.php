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
            	$set1 = explode(' ', $this->request->data['Post']['statement']);
            	$set2 = explode(' ', $this->request->data['Post']['description']);

            	foreach ($set1 as $Word) {
            		$Word = trim($Word);
            		$Word = stripslashes($Word);
            		$Word = strtolower($Word);
            	}

            	foreach ($set2 as $Word) {
            		$Word = trim($Word);
            		$Word = stripslashes($Word);
            		$Word = strtolower($Word);
            	}

            	$referenceWords = array();
            	$refWords = $this->Post->query('select * from refkeywords');
            	//debug($refWords);
            	foreach ($refWords as $Word)
            	{
            	$referenceWords[] = strtolower($Word['refkeywords']['word']);
            	}

            	$mergeWords = array_merge($set1,$set2);

            	$set4 = array_intersect($mergeWords, $referenceWords);
            	$set4 = array_unique($set4);

            	$data = array();

            	foreach ($set4 as $Word) {
            		$Word = trim($Word);
            		$Word = stripslashes($Word);
            		$data[] = array('word'=>$Word,'post_id'=>$this->Post->getLastInsertId());
            	}
            	
            	$this->Post->Keyword->saveMany($data);

            	$this->Session->setFlash(__('Question created!'));
            	return $this->redirect('/users/dashboard');
            }
            $this->Session->setFlash(__('The information could not be saved. Please, try again.'));
        }
    }

    public function view($id=null)
    {
    	if(!$id)
    	{
    		$this->Session->setFlash(__('Illegal Id value. Where you going?'));
    		echo $this->redirect('/users/dashboard');
    	}
    	else
    	{
    		$result = $this->Post->find('first',array('conditions'=>array('Post.id'=>$id, 'Post.active' => 1)));
            if(count($result) == 0) {
                echo $this->redirect('/users/dashboard');
            }

    		$this->set('myPdp',$result);
            $this->set('messages',$this->Post->Message->find('all',array('conditions'=>array('post_id'=>$id),'limit'=>10)));
    	}
    }

    public function acceptMentee($postId=null)
    {
    
    	if(!$postId)
    	{
    		$this->Session->setFlash(__('Illegal Id value. Where you going?'));
    		echo $this->redirect('/users/dashboard');
    	}
    	$result = $this->Post->find('first',array('conditions'=>array('Post.id'=>$postId, 'Post.active'=> 1)));
    	if($result['Post']['mentor_id']==0)
    	{
    		$this->Post->id = $postId;
    		$this->request->data['Post']['mentor_id'] = $this->Session->read('Auth.User.id');
    		if($this->Post->save($this->request->data)) {
    			$this->Session->setFlash(__('Congratulations! You have a new mentee.'));
    			echo $this->redirect('/posts/view/'.$postId);
    		}
            else {
                echo $this->redirect('/users/dashboard');
            }
    	}
    }

    public function createMeeting($postId=null)
    {
        $this->set('postId',$postId);
        if($this->request->is('post')) {
            if($postId==null)
            {
             $this->Session->setFlash(__('Illegal Id value. Where you going?'));
             echo $this->redirect('/users/dashboard');   
            }
            else
            {
                $this->Post->Meeting->create();
                $this->request->data['Meeting']['post_id'] = $postId;
                if($this->Post->Meeting->save($this->request->data))
                {
                    $this->Session->setFlash(__('Next Meeting has been scheduled.'));
                    echo $this->redirect('/posts/view/'.$postId);
                }

            }
        }
    }

    public function drop($postId)
    {
     if($postId==null)
        {
         $this->Session->setFlash(__('Illegal Id value. Where you going?'));   
        }
        else
        {
            $this->Post->id = $postId;
            $this->request->data['Post']['active'] = 0;
            $this->Post->save($this->request->data);
        } 

        echo $this->redirect('/users/dashboard');  
    }


}

?>