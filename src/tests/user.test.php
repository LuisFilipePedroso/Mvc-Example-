<?php 
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require realpath(dirname(__DIR__)) . '/models/mysql/UserDAO.php';
require realpath(dirname(__DIR__)) . '/models/UserBO.php';

class UserTest extends TestCase {

    public function testGet() {

        $user = new UserBO(new UserDAO());

        $users = $user->get();

        $this->assertEquals(
            'array',
            gettype($users)
        );
    }

    public function testGetById() {

        $userBO = new UserBO(new UserDAO());

        $user = $userBO->getById(1);

        $this->assertEquals(
            'array',
            gettype($user)
        );
    }

    public function testCreate() {

        $userBO = new UserBO(new UserDAO());

        $data = [
            'name' => 'Luis Filipe',
            'email' => 'luis_filipe42@outlook.com',
            'age' => 21
        ];

        $user = $userBO->create($data);

        $this->assertEquals(
            $data,
            $user
        );
    }

    public function testUpdate() {

        $userBO = new UserBO(new UserDAO());

        $data = [
            'id' => 1,
            'name' => 'Luis',
            'email' => 'luis_filipe42@outlook.com',
            'age' => 21
        ];

        $user = $userBO->update($data);

        $this->assertEquals(
            $data,
            $user
        );
    }

    public function testDestroy() {

        $userBO = new UserBO(new UserDAO());

        $user = $userBO->destroy(1);

        $this->assertEquals(
            'SUCCESS',
            $user
        );
    }
}