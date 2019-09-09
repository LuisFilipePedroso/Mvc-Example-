<?php 

class UserDTO {

    private $id;
    private $name;
    private $email;
    private $age;

    public function __construct($id, $name = "", $email = "", $age = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setEmail($name) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setAge($name) {
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }
}