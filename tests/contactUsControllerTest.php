<?php
require "src/contactUsController.php";

class ContactUsControllerTest extends PHPUnit_Framework_TestCase {
    public function testControllerExists($value='')
    {
        $c = new ContactUsController();
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