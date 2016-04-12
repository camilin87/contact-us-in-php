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

    }
}
?>