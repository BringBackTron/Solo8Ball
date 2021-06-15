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
        //Makes fields sticky and sets default value
        if (!empty($_POST['uname'])) {
            $this->_f3->set('unameSticky', $_POST['uname']);
        }

        $isValiduname = false;
        $isValidpsw = false;

        //submit data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<script>console.log("IN POST")</script>';

            if(empty(trim($_POST['uname']))){
                $this->_f3 -> set('errors["uname"]', "Username is required");
            } else {
                $username = trim($_POST['uname']);
                $isValiduname = true;
                echo '<script>console.log("Is valid name")</script>';
            }

            if(empty(trim($_POST['psw']))){
                $this->_f3 -> set('errors["psw"]', "Password can not be empty");
            } else {
                $password = trim($_POST['psw']);
                $isValidpsw = true;
                echo '<script>console.log("Is valid pass")</script>';

            }

            if ($isValidpsw && $isValiduname) {
                //pulled creds accept username password

                $pulledCreds = $GLOBALS['dataLayer']->pullCredentials($username);
                $hashedPassword = password_hash($pulledCreds['password'], PASSWORD_DEFAULT);

                $isTrue = password_verify($password, $hashedPassword);



                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $pulledCreds['user_id'];
                    $_SESSION['username'] = $pulledCreds['username'];
                    echo '<script>console.log("Passwords Match, user logged in")</script>';
                } else {
                    echo '<script>console.log("Account with matching credentials not found")</script>';
                }
            }



            // if pull credentials is blank


        }
        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/login.html');
    }

    function sim()
    {
        //instantiate class
        $player = new EightBallPlayer(0, 0, 0);
        $user = $GLOBALS['dataLayer']->pullPlayerData($_SESSION['user_id']);
        $this->_f3->set('user', $user);

        $player->setUserID($user['user_ID']);
        $player->setTotalGames($user['total_scores']);
        $player->setTotalTime($user['total_time']);

        //Makes fields sticky and sets default value
        if (!empty($_POST['time'])) {
            $this->_f3->set('timeSticky', $_POST['time']);
        } else {
            $this->_f3->set('timeSticky', 0);
        }
        if (!empty($_POST['shots'])) {
            $this->_f3->set('shotsSticky', $_POST['shots']);
        } else {
            $this->_f3->set('shotsSticky', 0);
        }
        if (!empty($_POST['score'])) {
            $this->_f3->set('scoreSticky', $_POST['score']);
        } else {
            $this->_f3->set('scoreSticky', 0);
        }

        //send scores
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (generatorValidation::validateTime($_POST['time'])) {
                $this->_f3->set('submit', true);

                $player->setTime($_POST['time']);
                $player->setShots($_POST['shots']);
                $player->setScore($_POST['score']);

                $scoreId = $GLOBALS['dataLayer']->saveScore($player);
                $GLOBALS['dataLayer']->updatePlayerData($player);
                $this->_f3->set('scoreId', $scoreId);
            } else {
                $this->_f3->set('error', "Submission cannot be 0");
            }
        }

        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/gameSim.html');
    }

    function leaderboard()
    {
        $tableData = $GLOBALS['dataLayer']->pullLeaderboardData();
        $this->_f3->set('table', $tableData);

        //display leaderboard page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/leaderboard.html');
    }

    function about()
    {
        //display about page
        $view = new Template();
        //include("views/navbar.html");
        echo $view->render('views/navbar.html');
        echo $view->render('views/about.html');
    }

}