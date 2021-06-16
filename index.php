<?php

/**
 * The index.php file
 * Redirects the user to the correct routes
 *
 * @author Jean-Kenneth Antonio
 * @author George Mcmullen
 * @version 0.001
 */
//require autoload file
require_once("vendor/autoload.php");
require ('/home/greenluc/config.php');

// Start a session
session_start();

//create an instance of the base class
$f3 = Base::instance();
$dataLayer = new DataLayerBall();
$con = new ControllerBall($f3); //create a controller class

  /**
    * Define a default route (home page)
    */
$f3->route('GET /', function(){
    // render home view
    $GLOBALS['con']->home();
});

  /**
    * define login route
    */
$f3->route('GET|POST /login', function(){
    // render login view
    $GLOBALS['con']->login();
});

  /**
    * define game route
   */
$f3->route('GET /game', function(){
    // render game view
    $GLOBALS['con']->game();
});

  /**
    * define leaderboard route
    */
$f3->route('GET /leaderboard', function(){
    // render leaderboard view
    $GLOBALS['con']->leaderboard();
});

  /**
    * define simulation route
    */
$f3->route('GET|POST /sim', function(){
    // render simulator view
    $GLOBALS['con']->sim();
});

  /**
    * define logout protocol
    */
$f3->route('GET /logout', function(){
    // executes logout protocol
    $GLOBALS['con']->logout();
});

//run fat free
$f3->run();