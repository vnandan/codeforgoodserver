<?php

class MessagesController extends AppController {
    public function index()
    {
        
    }
    public function add($message=null,$postId=null)   
    {
    	$userId = $this->Session->read('Auth.User.id');
    	if($message==null||$postId==null)
    	{
    		$this->Session->setFlash(__('Whoops! Watch where you are going. Something wrong with your info!'));
    		echo $this->redirect('/users/dashboard');
    	}
    	else
    	{
    		$this->Message->create();
    		$this->request->data['Message']['message'] = $message;
    		$this->request->data['Message']['user_id'] = $userId;
    		$this->request->data['Message']['post_id'] = $postId;

    		if($this->Message->save($this->request->data))
    		{
    			echo $this->redirect('/users/dashboard');
    		}
    	}
    }
    public function getMessages($postId=null,$number=10)
    {
    	$this->autoRender = false;

    	$result = $this->Message->find('all',array('conditions'=>array('post_id'=>$postId)));
    	if(count($result)>0)
    	{
    	if(($this->Session->read('Auth.User.id')!=$result[0]['Message']['user_id'])&&($this->Session->read('Auth.User.id')!=$result[0]['Post']['user_id']))
    	{
    		$this->Session->setFlash(__('Whoops! Watch where you are going. Something wrong with your info!'));
    		echo $this->redirect('/users/dashboard');
    	}
    	$this->set('messages',$this->Message->find('all',array('conditions'=>array('post_id'=>$postId),'limit'=>$number)));

    	}

	}
}

?>