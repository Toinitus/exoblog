<?php
namespace App\Model\Table;

use Core\Model\Table;

class UserTable extends Table
{
    public function getUser($mail, $password) {
        $user = $this->query("SELECT * FROM $this->table 
            WHERE mail = ?", [$mail], true);
        if($user) {
            if(password_verify($password, $user->getPassword())) {
                $user->setPassword('');
                return $user;
            }
        }
        return false;
    }

    public function getUserByid($id) {
        return $this->query("SELECT * FROM $this->table
        WHERE $this->table.id = ?", [$id], true);
    }
}
