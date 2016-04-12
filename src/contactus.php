<?php 
    require "contactUsController.php";
    require "dbConnectionFactory.php";
    require "headerModifier.php";

    $c = new ContactUsController(
        NULL,
        new DbConnectionFactory(),
        new HeaderModifier()
    );
    $c->processRequest();
?>
