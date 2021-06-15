<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
        $this->updateLogOut();
        echo $view->render('views/home.html');
    }

    function game()
    {
        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/game.html');
        $this->updateLogOut();
    }

    function login()
    {
        //Makes fields sticky and sets default value
        if (!empty($_POST['username'])) {
            $this->_f3->set('unameSticky', $_POST['username']);
        }

        $isValiduname = false;
        $isValidpsw = false;
        $isValidContain = false;

        //submit data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(empty(trim($_POST['username']))){
                $this->_f3 -> set('errors["username"]', "Username is required");
            //} else if {

            } else {
                $username = trim($_POST['username']);
                $isValiduname = true;
            }

            if(empty(trim($_POST['password']))){
                $this->_f3 -> set('errors["password"]', "Password can not be empty");
            } else {
                $password = trim($_POST['password']);
                $isValidpsw = true;

            }

            if ($GLOBALS['dataLayer']->pullCredentials($username) !== false) {
                $isValidContain = true;
            }

            if ($isValidpsw && $isValiduname && $isValidContain) {

                //pulled creds accept username password
                $pulledCreds = $GLOBALS['dataLayer']->pullCredentials($username);
                var_dump($pulledCreds);
                $userid = $pulledCreds['user_id'];
                echo "<script>console.log('$userid')</script>";
                echo "<script>console.log('passed log id')</script>";

                $hashedPassword = password_hash($pulledCreds['password'], PASSWORD_DEFAULT);

                $isTrue = password_verify($password, $hashedPassword);

                if ($isTrue) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $pulledCreds['user_id'];
                    $_SESSION['username'] = $pulledCreds['username'];
                    header("Location: /328/Solo8Ball");
                }
            }

        }
        //display game page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/login.html');
        $this->updateLogOut();
    }

    function sim()
    {
        $this->_f3->clear('submitted');
        //instantiate class
        $player = new EightBallPlayer(0, 0, 0);
        if (isset($_SESSION['loggedin'])) {
            $user = $GLOBALS['dataLayer']->pullPlayerData($_SESSION['user_id']);
            $userid = $_SESSION['user_id'];
            echo "<script>console.log('pulling player data line 115')</script>";
            echo "<script>console.log('$userid')</script>";
            $this->_f3->set('user', $user);
            $player->setUserID($user['user_ID']);
            $player->setTotalGames($user['total_scores']);
            $player->setTotalTime($user['total_time']);
        }

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

        echo "<script>console.log('past sticky line 141')</script>";

        //send scores
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (generatorValidation::validateTime($_POST['time'])) {
                $this->_f3->set('submit', true);

                $player->setTime($_POST['time']);
                $player->setShots($_POST['shots']);
                $player->setScore($_POST['score']);
                echo "<script>console.log('before sfd saving scores line 151')</script>";
                $scoreID = $GLOBALS['dataLayer']->saveScore($player);
                echo "<script>console.log('after saving data line 153')</script>";
                $GLOBALS['dataLayer']->updatePlayerData($player);
                echo "<script>console.log('after update data line 155')</script>";
                $this->_f3->set('submitted', true);

            } else {
                $this->_f3->set('error', "Submission cannot be 0");
            }
        }

        echo "<script>console.log('past sending scores line 162')</script>";
        //display game page
        $view = new Template();

        echo $view->render('views/navbar.html');
        echo "<script>console.log('past navbar line 163')</script>";
        echo $view->render('views/gameSim.html');
        echo "<script>console.log('not logged in line 165')</script>";
        $this->updateLogOut();
        $this->updateSimButton();

        if ($this->_f3->exists('submitted')) {
              $this->buttonSubmission();
              $this->_f3->set('submitted', false);
        }

    }

    function simtest()
    {
        //display game page
        $view = new Template();

        echo $view->render('views/navbar.html');
        var_dump($_SESSION);
        echo $view->render('views/gameSim.html');
        $this->updateLogOut();
        $this->updateSimButton();

    }

    function leaderboard()
    {
        $tableData = $GLOBALS['dataLayer']->pullLeaderboardData();
        $this->_f3->set('table', $tableData);
        //display leaderboard page
        $view = new Template();
        echo $view->render('views/navbar.html');
        echo $view->render('views/leaderboard.html');
        $this->updateLogOut();
    }

    function about()
    {
        //display about page
        $view = new Template();
        //include("views/navbar.html");
        echo $view->render('views/navbar.html');
        echo $view->render('views/about.html');
        $this->updateLogOut();
    }

    function updateLogOut()
    {

        if(isset($_SESSION['loggedin'])) {
            $username = $_SESSION['username'];
            echo "<script>document.getElementById('loginButton').innerHTML = '<b>$username</b>'</script>";
            echo '<script>document.getElementById("loginButton").innerHTML += " - Logout"</script>';
            echo '<script>document.getElementById("loginButton").href = "logout"</script>';
            echo '<script>console.log("logged in, log out button is on")</script>';

            //$this->_f3->set('loginBtn', "Logout");
            //$this->_f3->set('loginBtnRef', "logout");
        } else {
            echo '<script>document.getElementById("loginButton").innerHTML = "Login"</script>';
            echo '<script>document.getElementById("loginButton").href = "login"</script>';
            echo '<script>console.log("logged out, log in button is on")</script>';
            //$this->_f3->set('loginBtn', "Login");
            //$this->_f3->set('loginBtnRef', "login");
        }

    }

    function updateSimButton()
    {

        if(!isset($_SESSION['loggedin'])) {
            echo '<script>document.getElementById("btn-submit-score").hidden = true</script>';
            echo '<script>document.getElementById("disabledText").innerText = "Please log in to submit"</script>';
            echo '<script>console.log("logged out, submit score button is off")</script>';
            echo "<script>console.log('not logged in line 238')</script>";
        } else {
            echo '<script>document.getElementsByClassName("disabledText").value = ""</script>';
            echo '<script>console.log("logged in, submit score button is on")</script>';
        }
    }

    function logOut()
    {
        session_destroy();
        session_start();
        header("Location: /328/Solo8Ball");
    }

    function buttonSubmission()
    {
           echo '<script>document.getElementById("btn-submit-score").hidden = true</script>';
           echo '<script>document.getElementById("disabledText").innerText = "Your submission was counted!"</script>';
        echo "<script>console.log('btn submission line 255')</script>";
    }



}