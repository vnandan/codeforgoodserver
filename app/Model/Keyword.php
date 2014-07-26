<?php
App::uses('AppModel', 'Model');

class Keyword extends AppModel {
 
public $name = 'Keyword';
public $belongsTo = array('Post');

}
?>