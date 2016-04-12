<?php 
class ContactUsController{
    private $errorHandler = NULL;
    private $connectionFactory = NULL;

    function __construct($errorHandler, $connectionFactory){
        $this->errorHandler = $errorHandler;
        $this->connectionFactory = $connectionFactory;
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

        $conn = $this->connectionFactory->createNew("mysql:host=127.0.0.1;dbname=TddContactUs", "root", "");

        $conn->exec("INSERT INTO Submissions(name, email) VALUES('".$_POST["txtName"]."', 'a@a.com')");
    }
}
?>