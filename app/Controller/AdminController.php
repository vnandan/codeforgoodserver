
<?php

class AdminController extends AppController 
{
    public $layout = 'cakephp';
    public $uses = array('Post');
    var $scaffold;
    	
    public function beforeFilter()
    {
        parent::beforeFilter();
        //$this->Auth->allow();
    }
