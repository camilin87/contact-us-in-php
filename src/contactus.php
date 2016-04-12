<?php 
    require "contactUsController.php";
    require "dbConnectionFactory.php";

    $c = new ContactUsController(
        NULL,
        new DbConnectionFactory(),
        NULL
    );
    $c->processRequest();
?>
