<?php 
class ContactUsController{
    private $errorHandler = NULL;

    function __construct($errorHandler){
        $this->errorHandler = $errorHandler;
    }

    public function processRequest(){
        if (!isset($_POST["txtName"])){
            $this->errorHandler->displayError("no name provided");
            return;
        }

        if (!isset($_POST["txtEmail"])){
            $this->errorHandler->displayError("no email provided");
            return;
        }
    }
}
?>