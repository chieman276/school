<?php
class Request {
    private $requestData;
    private $errors = [];
    public function __construct($request)
    {
        $this->requestData = $request;
    }
    public function validateForm($fields, $messages) {

        foreach ($fields as $field){
            if(isset($this->requestData[$field]) && $this->requestData[$field] == "") {
                $this->errors[$field] = $messages[$field];
            }
        }
        $_SESSION['errors' ] = $this->errors;
        // echo "<pre>";
        // print_r($fields);
        // print_r($this->requestData);
        // echo "</pre>";
        // die();

    }
    public function isValid(){
        if(count($this->errors) > 0){
            return false;
        } else {
            return true;
        }
    }
    public function getErrors(){
        return $this->errors;
    }
}