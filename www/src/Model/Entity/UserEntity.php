<?php
namespace App\Model\Entity;

use Core\Model\Entity;

use Core\Controller\Helpers\TextController;

class UserEntity extends Entity
{
    private $id;

    private $mail;

    private $password;

    private $token;

    private $createdAt;

    private $verify;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getVerify() {
        return $this->verify;
    }

    public function getToken() {
        return $this->token;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setMail(string $mail) {
        $this->mail = $mail;
    }

    public function setPassword(string $password) {
        $password = password_hash(htmlspecialchars($password), PASSWORD_BCRYPT);
        $this->password = $password;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setVerify($verify) {
        $this->verify = $verify;
    }
}
