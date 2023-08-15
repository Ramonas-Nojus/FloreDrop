<?php 

spl_autoload_register("classAutoloader");

function classAutoloader($className){

    $path = "classes/";
    $extension = ".class.php";

    require_once $path.$className.$extension;

}