<?php 
class ContactUsController{
    private $errorHandler = NULL;

    function __construct($errorHandler){
        $this->errorHandler = $errorHandler;
    }
}
?>