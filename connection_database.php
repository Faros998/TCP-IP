<?php
$server="localhost";
$uzivatel="root";
$heslo="root";
$databaze="ip";
$connection=new mysqli($server,$uzivatel,$heslo,$databaze); 
$connection->set_charset("utf8");                         
