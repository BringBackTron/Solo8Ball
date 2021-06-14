<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once("vendor/autoload.php");
require ('/home/jantonio/config.php');

// Start a session
session_start();

//create an instance of the base class
$f3 = Base::instance();
$dataLayer = new DataLayerBall();
$con = new ControllerBall($f3); //create a controller class

//set fat-free debugging
$f3->set('DEBUG', 3);

//Define a default route (home page)
$f3->route('GET /', function(){
    // render home.html
    $GLOBALS['con']->home();
});

//define simulation route
$f3->route('GET|POST /login', function(){
    // render gameSim.html
    $GLOBALS['con']->login();
});

//define game route
$f3->route('GET /game', function(){
    // render game.html
    $GLOBALS['con']->game();
});

//define leaderboard route
$f3->route('GET /leaderboard', function(){
    // render game.html
    $GLOBALS['con']->leaderboard();
});

//define simulation route
$f3->route('GET|POST /sim', function(){
    // render gameSim.html
    $GLOBALS['con']->sim();
});

//define about route
$f3->route('GET /about', function(){
    // render about.html
    $GLOBALS['con']->about();
});

//run fat free
$f3->run();