<?php

/**
 * Class controller
 * @author Jean-Kenneth "Jake" Antonio
 */
class ControllerBall
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
        echo $view->render('views/navbar.html');
        echo $view->render('views/home.html');
    }

    function game()
    {
        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/game.html');
    }

    function sim()
    {
        if (!empty($_POST['time'])){
            $this->_f3->set('timeSticky',$_POST['time']);
        }
        if (!empty($_POST['shots'])){
            $this->_f3->set('shotsSticky',$_POST['shots']);
        }
        if (!empty($_POST['score'])){
            $this->_f3->set('scoreSticky',$_POST['score']);
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['time'] = $_POST['time'];
            $_SESSION['shots'] = $_POST['shots'];
            $_SESSION['score'] = $_POST['score'];
        }

        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/gameSim.html');
    }


    function about()
    {
        //display game page
        $view = new Template();
        //include("views/navbar.html");
        echo $view->render('views/navbar.html');
        echo $view->render('views/about.html');
    }

}