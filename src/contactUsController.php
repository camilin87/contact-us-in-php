<?php 
class ContactUsController{
    private $errorHandler = NULL;
    private $connectionFactory = NULL;
    private $headerModifier = NULL;

    function __construct($errorHandler, $connectionFactory, $headerModifier){
        $this->errorHandler = $errorHandler;
        $this->connectionFactory = $connectionFactory;
        $this->headerModifier = $headerModifier;
    }

    public function processRequest(){
        if (!isset($_POST["txtName"])){
            $this->errorHandler->displayError("no name provided");
            return;
        }

        $this->headerModifier->setHeader("HTTP/1.1 303 Other");

        if (!isset($_POST["txtEmail"])){
            $this->errorHandler->displayError("no email provided");
            return;
        }

        $conn = $this->connectionFactory->createNew("mysql:host=127.0.0.1;dbname=TddContactUs", "root", "");

        $conn->exec("INSERT INTO Submissions(name, email) VALUES('".$_POST["txtName"]."', '".$_POST["txtEmail"]."')");
    }
}
?>