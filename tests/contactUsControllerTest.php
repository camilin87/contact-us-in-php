<?php
require "src/contactUsController.php";

class ContactUsControllerTest extends PHPUnit_Framework_TestCase {
    public function testControllerExists() {
        $c = new ContactUsController(NULL);
        $this->assertNotNull($c);
    }

    public function testDisplayAnErrorIfNoNameIsProvided() {
        $errorHandlerMock = $this->getMockBuilder('ErrorHandler')
                                 ->setMethods(array('displayError'))
                                 ->getMock();
        $errorHandlerMock->expects($this->once())
                         ->method('displayError')
                         ->with($this->equalTo('no name provided'));

        $c = new ContactUsController($errorHandlerMock, NULL);

        $c->processRequest();
    }

    public function testDisplayAnErrorIfNoEmailIsProvided() {
        $_POST["txtName"] = "john doe";

        $errorHandlerMock = $this->getMockBuilder('ErrorHandler')
                                 ->setMethods(array('displayError'))
                                 ->getMock();
        $errorHandlerMock->expects($this->once())
                         ->method('displayError')
                         ->with($this->equalTo('no email provided'));

        $c = new ContactUsController($errorHandlerMock, NULL);

        $c->processRequest();
    }

    public function testConnectsToTheCorrectDatabase() {
        $_POST["txtName"] = "john doe";
        $_POST["txtEmail"] = "a@a.com";

        $connectionFactoryMock = $this->getMockBuilder('DbConnectionFactory')
                                      ->setMethods(array('createNew'))
                                      ->getMock();
        $connectionFactoryMock->expects($this->once())
                              ->method('createNew')
                              ->with(
                                 $this->equalTo("mysql:host=127.0.0.1;dbname=TddContactUs"),
                                 $this->equalTo("root"),
                                 $this->equalTo("")
                              );

        $c = new ContactUsController(NULL, $connectionFactoryMock);

        $c->processRequest();
    }
}
?>