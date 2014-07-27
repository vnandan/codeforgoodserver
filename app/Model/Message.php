<?php
App::uses('AppModel', 'Model');

class Message extends AppModel {
 
public $name = 'Message';
public $belongsTo = array('Post');
}
?>