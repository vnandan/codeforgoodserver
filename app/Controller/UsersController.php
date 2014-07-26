<?php

class UsersController extends AppController {
    public function index() {
        $users = $this->User->find('all');
        $this->set('users', $users);
    }
}

?>