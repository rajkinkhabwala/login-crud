<?php 


    // Requiring the Config File

    require 'config.php';

    // Requiring all the Important classes

    spl_autoload_register(function($classname){
        require_once 'classes/' . $classname . '.class.php';
    });