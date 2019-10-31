<?php

class scraped

{
    public $ota;
    public $title = array();
    public $price = array();
    public $checkInDate;
    public $checkOutDate;
    public $city;
    public $state;
    public $country;
    public $adults;
    public $children;
    public $rooms;



    public function addPrice($price){
        $this->price[] = trim($price);
    }

    public function addTitle($title){
        $this->title[] = trim($title);
    }


    /**
     * @return mixed0
     */
    public function getOta()
    {
        return $this->ota;
    }

    /**
     * @param mixed $ota
     */
    public function setOta($ota)
    {
        $this->ota = $ota;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
//    public function setTitle($title)
//    {
//        $this->title = $title;
//    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
//    public function setPrice($price)
//    {
//        $this->price = $price;
//    }

    /**
     * @return mixed
     */
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    /**
     * @param mixed $checkInDate
     */
    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
    }

    /**
     * @return mixed
     */
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    /**
     * @param mixed $checkOutDate
     */
    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * @param mixed $adults
     */
    public function setAdults($adults)
    {
        $this->adults = $adults;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }
    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }


}