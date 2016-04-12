<?php 
    require "contactUsController.php";
    require "dbConnectionFactory.php";
    require "headerModifier.php";
    require "errorHandler.php";
    require "settingsReader.php";

    $c = new ContactUsController(
        new ErrorHandler(),
        new DbConnectionFactory(),
        new HeaderModifier(),
        new SettingsReader()
    );
    $c->processRequest();
?>
