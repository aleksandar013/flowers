<?php

ob_start();
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11/04/2015
 * Time: 10:12
 */
//definisemo konstantu , moze da se zove bilo kako, ja sam je nazvao Framework loaded, sluzi da obezbedi pristup sajtu samo preko index.php strane
define("FRAMEWORK_LOADED",true);
// metod autoload kojim ukljucujemo potrebne klase
function __autoload($class){
    require_once "classes/{$class}.php";
}

