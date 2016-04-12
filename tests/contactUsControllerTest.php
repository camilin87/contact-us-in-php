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

        $c = new ContactUsController($errorHandlerMock);

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

        $c = new ContactUsController($errorHandlerMock);

        $c->processRequest();
    }
}
?>