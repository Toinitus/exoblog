<?php
namespace App\Model\Entity;

use Core\Model\Entity;

class Orders_lineEntity extends Entity
{
   private $id;
   private $user_id;
   private $beer_id;
   private $beerPriceHT;
   private $beerQty;
   private $token;

   public function getId() {
       return $this->id;
   }

   public function getUserId() {
       return $this->user_id;
   }

   public function getBeerId() {
        return $this->beer_id;
    }

   public function getpriceHT() {
       return $this->beerPriceHT;
   }

   public function getQty() {
       return $this->beerQty;
   }

   public function getToken() {
       return $this->token;
   }   
}
