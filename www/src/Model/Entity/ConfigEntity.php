<?php
namespace App\Model\Entity;

use Core\Model\Entity;

class ConfigEntity extends Entity
{

    private $id;

    private $date;

    private $tva;

    private $port;

    private $ship_limit;

    public function getId() {
        return $this->id;
    }

    public function getTva() {
        return $this->tva;
    }

    public function getPort() {
        return $this->port;
    }

    public function getShipLimit() {
        return $this->ship_limit;
    }

    public function getDate() {
        return $this->date;
    }
}
