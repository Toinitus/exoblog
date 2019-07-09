<?php
namespace App\Model\Entity;

use Core\Model\Entity;

class OrdersEntity extends Entity
{
   private $id;
   private $userinfos_id;
   private $priceHT;
   private $port;
   private $ordersTva;
   private $created_at;
   private $status_id;
   private $token;

   public function getId() {
       return $this->id;
   }

   public function getUserInfos() {
       return $this->userInfos;
   }

   public function getpriceHT() {
       return $this->priceHT;
   }

   public function getPort() {
       return $this->port;
   }

   public function getOrdersTva() {
       return $this->ordersTva;
   }

   public function getCreatedAt() {
       return $this->created_at;
   }

   public function getStatus() {
       return $this->status_id;
   }

   public function getToken() {
       return $this->token;
   }   
}
