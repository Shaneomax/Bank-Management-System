<?php 

class accountModel{
    private $id;
    private $accountNumber;
    private $accountTypesId;

    public function __construct()
    {
        
    }

    public function __construct1($accountNumber,$accountTypesId)
    {
        $this->accountNumber=$accountNumber;
        $this->accountTypesId=$accountTypesId;
    }

    public function getId(){
        return $this->id;
    }

    public function getAccountNumber(){
        return $this->accountNumber;
    }

    public function getAccountTypesId(){
        return $this->accountTypesId;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setAccountNumber($accountNumber){
        $this->accountNumber=$accountNumber;
    }

    public function setAccountTypesId($accountTypesId){
        $this->accountTypesId=$accountTypesId;
    }
}