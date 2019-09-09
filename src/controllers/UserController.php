<?php

require('../models/mysql/UserDAO.php');
require('../models/UserBO.php');

class UserController {

    private $user;

    function __construct() {
        $this->user = new UserBO(new UserDAO());
    }

    function get() {
        return $this->user->get();
    }

    function getById($id) {
        return $this->user->getById($id);
    }

    function create($user) {
        return $this->user->create($user);  
    }

    function update($user) {
        return $this->user->update($user);
    }

    function destroy($id) {
        return $this->user->destroy($id);
    }

    public function getUser() {
        return $this->user;
    }
}