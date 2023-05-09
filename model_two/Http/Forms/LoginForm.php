<?php

class LoginForm{
    
    protected $errors = [];

    public function __construct($attributes){
        if(!Validator::email($this->attributes['email'])){
            $this->errors['email'] = "Please enter a valid email address";
        }
        if(!Validator::string($this->attributes['password'])){
            $this->errors['password'] = "Please provide a valid password";
        }
        
    }

    public function validate($email , $password){
            $instance = new static($attributes);
            if ($instance->failed()) {
                throw new \Exception();
                
            }
    }

    public function failed(){
        return count($this->errors);
    }
    public function errors(){
        return $this->errors;
    }

    public function error($field , $message){
        $this->errors[$field] = $message;
    }

}