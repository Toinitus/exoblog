<?php
namespace App\Model\Entity;

use Core\Model\Entity;

use Core\Controller\Helpers\TextController;

class User_infosEntity extends Entity
{
    private $id;

    private $user_id;

    private $lastname;

    private $firstname;

    private $address;

    private $city;

    private $zipCode;

    private $country;

    private $phone;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of name
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the value of slug
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the value of content
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set the value of id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set the value of id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Set the value of name
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Set the value of slug
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Set the value of content
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}
