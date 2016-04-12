<?php 
class ContactUsController{
    private $errorHandler = NULL;

    function __construct($errorHandler){
        $this->errorHandler = $errorHandler;
    }

    public function processRequest(){
        $this->errorHandler->displayError("no name provided");
    }
}
?>