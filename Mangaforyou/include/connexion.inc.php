<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=mangaforyou;charset=utf8","root","" );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
} catch (Exception $e)
{
    $e->getMessage(); 
}

include_once("./include/fonction.inc.php");

?>