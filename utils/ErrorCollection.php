<?php

class ErrorCollection{
    private $errors = array();

    function addError($errorMessage){
        array_push($this->errors, $errorMessage);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        if (count($this->errors) == 0){
            return FALSE;
        }
        else{return TRUE;}
    }

};

?>