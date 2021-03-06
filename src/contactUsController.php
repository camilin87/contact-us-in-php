<?php 
class ContactUsController{
    private $errorHandler = NULL;
    private $connectionFactory = NULL;
    private $settingsReader = NULL;
    private $headerModifier = NULL;

    function __construct($errorHandler, $connectionFactory, $headerModifier, $settingsReader){
        $this->errorHandler = $errorHandler;
        $this->connectionFactory = $connectionFactory;
        $this->settingsReader = $settingsReader;
        $this->headerModifier = $headerModifier;
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

        $settings = $this->settingsReader->read();
        $conn = $this->connectionFactory->createNew(
            $settings["DB_CONN_STR"],
            $settings["DB_USER"],
            $settings["DB_PWD"]
        );

        try{
            $conn->exec("INSERT INTO Submissions(name, email) VALUES('".$_POST["txtName"]."', '".$_POST["txtEmail"]."')");
        }catch(PDOException $ex){
            $this->errorHandler->displayError("db error");
            return;
        }

        $this->headerModifier->setHeader("HTTP/1.1 303 Other");
        $this->headerModifier->setHeader("Location: http://giphy.com/gifs/zooey-deschanel-happy-tv-show-1VdCubIflP7iM");
    }
}
?>