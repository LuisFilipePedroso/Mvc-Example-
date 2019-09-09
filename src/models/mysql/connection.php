<?php

function connect() {
    $dsn = 'mysql:host=192.168.64.2;dbname=mvcproject';
    $user = 'admin';
    $pass = '123';
    
    try{
        return new PDO($dsn, $user, $pass);
    }catch (PDOException $e){
        // report error message
        echo $e->getMessage();
    }
}