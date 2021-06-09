<?php

/**
 * Class controller
 * @author Jean-Kenneth "Jake" Antonio
 */
class Controller
{
    private $_f3; // router

    /**
     * controller constructor.
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * Redirects to the home page
     */
    function home()
    {
        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function game()
    {
        //display game page
        $view = new Template();
        echo $view->render('views/game.html');
    }

}