<?php
require realpath(dirname(__DIR__)) . '/iModel.php';
require realpath(dirname(__DIR__)) . '/mysql/UserDTO.php';
require realpath(dirname(__DIR__)) . '/mysql/connection.php';

class UserDAO implements iModel{

    private $conn;

    public function __construct() {
        $this->conn = connect();
    }
    
    public function get() {
        try {
            $sql = 'SELECT * FROM users';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $userList = [];

            foreach($result as $user) {
                $userDTO = new UserDto($user['id'], $user['name'], $user['email'], $user['age']);
                array_push($userList, $userDTO);
            }

            return $userList;
        } catch (PDOException $e) {
            return $e;
        }
    }  
    
    public function getById($id) {
        try {
            $sql = 'SELECT * FROM users WHERE id = ' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch();
            // $userList = [];

            $userDTO = new UserDto($user['id'], $user['name'], $user['email'], $user['age']);
            // array_push($userList, $userDTO);
            return $userDTO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function create($user) {
        try {
            $sql = 'INSERT INTO users (name, email, age) VALUES (:name, :email, :age)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $user['name']);
            $stmt->bindParam(':email', $user['email']);
            $stmt->bindParam(':age', $user['age']);
            $stmt->execute();

            return 'SUCCESS';

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }  
    
    public function update($user) {
        try {
            $sql = 'UPDATE users SET name = :name, email = :email, age = :age WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $user['name']);
            $stmt->bindParam(':email', $user['email']);
            $stmt->bindParam(':age', $user['age']);
            $stmt->bindParam(':id', $user['id']);
            $stmt->execute();

            return 'SUCCESS';

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id) {
        try {
            $sql = 'DELETE FROM users WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return 'SUCCESS';

        } catch (PDOExpcetion $e) {
            return 'ERROR';
        }
    }
}