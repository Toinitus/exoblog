<?php
namespace App\Model\Entity;

use Core\Model\Entity;

use Core\Controller\Helpers\TextController;

class BeerEntity extends Entity
{
    private $id;
    private $title;
    private $img;
    private $content;
    private $priceHT;
    private $stock;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getPrice(): float
    {
        return $this->priceHT;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
}
