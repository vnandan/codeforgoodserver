<?php
App::uses('AppModel', 'Model');

class Skill extends AppModel {
 
public $name = 'Skill';
public $belongsTo = array('User');

}
?>