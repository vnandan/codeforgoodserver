<?php
App::uses('AppModel', 'Model');

class Meeting extends AppModel {
 
public $name = 'Meeting';
public $belongsTo = array('Post');

}
?>