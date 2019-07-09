<?php
namespace App\Model\Entity;

use Core\Model\Entity;

class CategoryEntity extends Entity
{

    private $id;

    private $slug;

    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getUrl(): string
    {
        return \App\App::getInstance()
            ->getRouter()
            ->url('category', [
                "slug" => $this->getSlug(),
                "id" => $this->getId()
            ]);
    }
}
