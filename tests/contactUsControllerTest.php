<?php
require "src/contactUsController.php";

class ContactUsControllerTest extends PHPUnit_Framework_TestCase {
    private function createErrorHandlerMock(){
        return $this->getMockBuilder('ErrorHandler')
                    ->setMethods(array('displayError'))
                    ->getMock();
    }

    private function createConnectionMock(){
        return $this->getMockBuilder('DbConnection')
                    ->setMethods(array('exec'))
                    ->getMock();
    }

    private function createConnectionFactoryMock(){
        return $this->getMockBuilder('DbConnectionFactory')
                    ->setMethods(array('createNew'))
                    ->getMock();
    }

    public function testDisplayAnErrorIfNoNameIsProvided() {
        $errorHandlerMock = $this->createErrorHandlerMock();
        $errorHandlerMock->expects($this->once())
                         ->method('displayError')
                         ->with($this->equalTo('no name provided'));

        $c = new ContactUsController($errorHandlerMock, NULL, NULL);

        $c->processRequest();
    }

    public function testDisplayAnErrorIfNoEmailIsProvided() {
        $_POST["txtName"] = "john doe";

        $errorHandlerMock = $this->createErrorHandlerMock();
        $errorHandlerMock->expects($this->once())
                         ->method('displayError')
                         ->with($this->equalTo('no email provided'));

        $c = new ContactUsController($errorHandlerMock, NULL, NULL);

        $c->processRequest();
    }

    public function testConnectsToTheCorrectDatabase() {
        $_POST["txtName"] = "john doe";
        $_POST["txtEmail"] = "a@a.com";

        $connectionMock = $this->createConnectionMock();
        $connectionFactoryMock = $this->createConnectionFactoryMock();
        $connectionFactoryMock->method('createNew')
                              ->willReturn($connectionMock);

        $connectionFactoryMock->expects($this->once())
                              ->method('createNew')
                              ->with(
                                 $this->equalTo("mysql:host=127.0.0.1;dbname=TddContactUs"),
                                 $this->equalTo("root"),
                                 $this->equalTo("")
                              );
        $headerModifierMock = $this->getMockBuilder('HeaderModifier')
                                   ->setMethods(array('setHeader'))
                                   ->getMock();

        $c = new ContactUsController(NULL, $connectionFactoryMock, $headerModifierMock);

        $c->processRequest();
    }

    public function testInsertsTheSubmissionInTheDatabase() {
        $_POST["txtName"] = "john doe";
        $_POST["txtEmail"] = "a@a.com";

        $connectionMock = $this->createConnectionMock();
        $connectionMock->expects($this->once())
                       ->method('exec')
                       ->with(
                            $this->equalTo("INSERT INTO Submissions(name, email) VALUES('john doe', 'a@a.com')")
                       );

        $connectionFactoryMock = $this->createConnectionFactoryMock();
        $connectionFactoryMock->method('createNew')
                              ->willReturn($connectionMock);
        $headerModifierMock = $this->getMockBuilder('HeaderModifier')
                                   ->setMethods(array('setHeader'))
                                   ->getMock();

        $c = new ContactUsController(NULL, $connectionFactoryMock, $headerModifierMock);


        $c->processRequest();
    }

    public function testRedirectsToASuccessPage() {
        $_POST["txtName"] = "john doe";
        $_POST["txtEmail"] = "a@a.com";

        $connectionMock = $this->createConnectionMock();
        $connectionFactoryMock = $this->createConnectionFactoryMock();
        $connectionFactoryMock->method('createNew')
                              ->willReturn($connectionMock);

        $headerModifierMock = $this->getMockBuilder('HeaderModifier')
                                   ->setMethods(array('setHeader'))
                                   ->getMock();
        $headerModifierMock->expects($this->once())
                           ->method('setHeader')
                           ->with($this->equalTo("HTTP/1.1 303 Other"));


        $c = new ContactUsController(NULL, $connectionFactoryMock, $headerModifierMock);


        $c->processRequest();
    }
}
?>