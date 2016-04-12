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
        //talk about the traditional way of just saying echo 'something'
        //introduce the concept of dependency injection

    }
}
?>