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

    function login()
    {
        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/login.html');
    }

    function sim()
    {
        //instantiate EightBallPlayer class
        $player = new EightBallPlayer(0,0,0);

        //Makes fields sticky and sets default value
        if (!empty($_POST['time'])){
            $this->_f3->set('timeSticky',$_POST['time']);
        }
        else {
            $this->_f3->set('timeSticky', 0);
        }
        if (!empty($_POST['shots'])){
            $this->_f3->set('shotsSticky',$_POST['shots']);
        }
        else {
            $this->_f3->set('shotsSticky', 0);
        }
        if (!empty($_POST['score'])){
            $this->_f3->set('scoreSticky',$_POST['score']);
        }
        else {
            $this->_f3->set('scoreSticky', 0);
        }

        //send scores to session
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_f3->set('submit', true);

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