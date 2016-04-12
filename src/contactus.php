<?php 
    require "contactUsController.php";
    require "dbConnectionFactory.php";
    require "headerModifier.php";
    require "errorHandler.php";

    $c = new ContactUsController(
        new ErrorHandler(),
        new DbConnectionFactory(),
        new HeaderModifier()
    );
    $c->processRequest();
?>
