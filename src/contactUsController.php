<?php 
class ContactUsController{
    private $errorHandler = NULL;

    function __construct($errorHandler){
        $this->errorHandler = $errorHandler;
    }

    public function processRequest(){
        $errorMessage = "no name provided";
        if (isset($_POST["txtName"])){
            $errorMessage = "no email provided";
        }

        $this->errorHandler->displayError($errorMessage);
    }
}
?>