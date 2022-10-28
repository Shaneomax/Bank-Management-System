<?php

class userModel{
    private $id;
    private $name;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $phone;
    private $password;
    private $sex;
    private $accountsId;

    public function __construct()
    {
        
    }

    public function __construct1($name,$firstName,$lastName,$email,$password,$address,$phone,$sex)
    {
        $this->name=$name;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->password=$password;
        $this->address=$address;
        $this->phone=$phone;
        $this->sex=$sex;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getSex(){
        return $this->sex;
    }

    public function getAccountsId(){
        return $this->accountsId;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function setFirstName($firstName){
        $this->firstName=$firstName;
    }


    public function setLastName($lastName){
        $this->lastName=$lastName;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setAddress($address){
        $this->address=$address;
    }


    public function setPhone($phone){
        $this->phone=$phone;
    }


    public function setPassword($password){
        $this->password=$password;
    }


    public function setSex($sex){
        $this->sex=$sex;
    }

    public function setAccountsId($accountsId){
        $this->accountsId=$accountsId;
    }
}