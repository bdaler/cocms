<?php
/**
 * Created by PhpStorm.
 * User: bdaler
 * Date: 29.04.16
 * Time: 15:54
 */
class Users{
    public $uid;
    public $uemail;
    public $ulogin;
    public $upassword;
    public $ustate;

    public function getUid(){
        return $this->uid;
    }

    public function setUid($uid){
        $this->uid = $uid;
        return $this;
    }

    public function getUemail()
    {
        return $this->uemail;
    }

    public function setUemail($uemail)
    {
        $this->uemail = $uemail;
        return $this;
    }

    public function getUlogin()
    {
        return $this->ulogin;
    }

    public function setUlogin($ulogin)
    {
        $this->ulogin = $ulogin;
        return $this;
    }

    public function getUpassword()
    {
        return $this->upassword;
    }

    public function setUpassword($upassword)
    {
        $this->upassword = $upassword;
        return $this;
    }

    public function getUstate()
    {
        return $this->ustate;
    }

    public function setUstate($ustate)
    {
        $this->ustate = $ustate;
        return $this;
    }
}