<?php


class UserEntity extends Entity
{
 private $id;
 private $username;
 private $password;
 private $email;
 private $confirmedPassword;

    public function __construct($username,$password){
        $this->setUsername($username);
        $this->setPassword($password);

    }
    /*
     public function __construct1($username,$password,$confirmedPassword,$email){
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setConfirmedPassword($confirmedPassword);
     }
    */
    /**
     * @return mixed
     */
    public function getConfirmedPassword()
    {
        return $this->confirmedPassword;
    }

    /**
     * @param mixed $confirmedPassword
     */
    public function setConfirmedPassword($confirmedPassword)
    {
        $this->confirmedPassword = $confirmedPassword;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function validateRegistration(){
        $errors=[
            'username'=>$this->validateUsername(),
            'password'=>$this->validatePassword(),
            'confirmedPassword'=>$this->validateConfirmedPassword(),
            'email'=>$this->validateEmail()
        ];
        return $errors;
    }

    public function validateLogin(){
        $errors=[
            'username'=>$this->validateUsername(),
            'password'=>$this->validatePassword(),
        ];
        return $errors;
    }

    public function validateUsername(){
        $errorMessage='';

        if(strlen($this->username)==0)
            $errorMessage='Field Username is required';
        if((strlen($this->username)> 0 && strlen($this->username)<4) || strlen($this->username)>30)
            $errorMessage='Field length must be between 4 and 30 symbols';
        return $errorMessage;
    }

    public function validatePassword(){

        $errorMessage='';

        if(strlen($this->password)==0)
            $errorMessage='Field Password is required';
        if((strlen($this->username)> 0 && strlen($this->username)<4) || strlen($this->username)>30)
            $errorMessage='Field length must be between 4 and 30 symbols';
        return $errorMessage;
    }
    public function validateConfirmedPassword(){

        $errorMessage='';

        if(strlen($this->confirmedPassword)==0)
            $errorMessage='Field Comnfirm Password is required';
        if((strlen($this->username)> 0 && strlen($this->username)<4) || strlen($this->username)>30)
            $errorMessage='Field length must be between 4 and 30 symbols';
        if($this->password != $this->confirmedPassword)
            $errorMessage ="No mutches Password and Confirmed Password";
        return $errorMessage;
    }
    public function validateEmail(){

        $errorMessage='';

        if(strlen($this->email)==0)
            $errorMessage='Field Email is required';
        if((strlen($this->username)> 0 && strlen($this->username)<4) || strlen($this->username)>30)
            $errorMessage='Field length must be between 4 and 30 symbols';
        if(filter_var($this->email,FILTER_VALIDATE_EMAIL)===false)
            $errorMessage="Invalid Email format";

        return $errorMessage;
    }

}