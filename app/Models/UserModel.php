<?php declare(strict_types=1);

namespace App\Models;

class UserModel extends \Core\Model
{
    public function create($data): bool
    {
        $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->bind('name', $data['name']);
        $this->bind('email', $data['email']);
        $this->bind('password', md5($data['password']));
        $this->execute();

        if ($this->lastInsertId()) {
            return true;
        }

        return false;
    }

    /**
     * @param $data
     * @return mixed row user data or false
     */
    public function login($data): mixed
    {
        $this->query('SELECT id, name, email FROM users WHERE email = :email AND password = :password AND is_active = 1');
        $this->bind('email', $data['email']);
        $this->bind('password', md5($data['password']));
        return $this->getSingleRow();
    }
}
