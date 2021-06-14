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
        //instantiate class
        $player = new EightBallPlayer(0,0,0);
        $user = $GLOBALS['dataLayer']->pullPlayerData();
        $this->_f3->set('user', $user);

        $player->setUserID($user['user_ID']);
        $player->setTotalGames($user['total_scores']);
        $player->setTotalTime($user['total_time']);

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

        //send scores
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (generatorValidation::validateTime($_POST['time'])){
                $this->_f3->set('submit', true);

                $player->setTime($_POST['time']);
                $player->setShots($_POST['shots']);
                $player->setScore($_POST['score']);

                $scoreId = $GLOBALS['dataLayer']->saveScore($player);
            }
            else {
                $this->_f3->set('error', "Submission cannot be 0");
            }

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