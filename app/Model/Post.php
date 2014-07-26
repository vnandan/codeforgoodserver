<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {
 
public $name = 'Post';
public $belongsTo = array('User');
public $hasMany = array('Keyword');

}
?>