<?php
require "src/contactUsController.php";

class ContactUsControllerTest extends PHPUnit_Framework_TestCase {
    public function testControllerExists() {
        $c = new ContactUsController(NULL);
        $this->assertNotNull($c);
    }

    public function testDisplayAnErrorIfNoNameIsProvided()
    {
        $errorHandlerMock = $this->getMockBuilder('ErrorHandler')
                                 ->setMethods(array('displayError'))
                                 ->getMock();
        $c = new ContactUsController($errorHandlerMock);

    }
}
?>