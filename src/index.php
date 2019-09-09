<?php 

require './models/mysql/UserDAO.php';
require './models/mysql/UserBO.php';

$user = new UserBO(new UserDAO());

$users = $user->get();
var_dump($users);
