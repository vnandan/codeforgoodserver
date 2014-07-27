
<?php

class AdminController extends AppController 
{
    
    public $uses = array('Post');
    
    public function index()
    {
    	$query="select count(*) from posts";
    	$result = $this->Post->query($query);

    	$this->set('postCount',$result[0][0]['count(*)']);

    }

 }