<?php

/* data-layer.php
 * Return data for the solo 8 ball
 */

//Require the config file
require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');

class DataLayerBall
{
    // Add a field for the database object
    /**
     * @var PDO The database connection object
     */
    private $_dbh;

    // Define a constructor

    /**
     * DataLayer constructor.
     */
    function __construct()
    {
        //Connect to the database
        try {
            //Instantiate a PDO database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected to database!";
        } catch (PDOException $e) {
            //echo $e->getMessage();  //for debugging only
            die ("A potentially critical error happened. Call an admin for assistance.");
        }
    }

    //TODO REPLACE ALL WHERE user_ID = 1 TO LOGGED IN USER!!!
    function saveScore($player) {
        //1. Define the query
        $sql = "INSERT INTO scores (user_id, shots, time, score) 
                VALUES (:user_id, :shots, :time, :score)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':user_id', $player->getUserID(), PDO::PARAM_INT);
        $statement->bindParam(':shots', $player->getShots(), PDO::PARAM_INT);
        $statement->bindParam(':time', $player->getTime(), PDO::PARAM_INT);
        $statement->bindParam(':score', $player->getScore(), PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    function updatePlayerData($player) {
        //1. Define the query
        $sql = "UPDATE users SET total_time = :newTime, total_scores = :newScores WHERE user_id = :user_id;";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $newTime = $player->updateTime($player->getTime());
        $newScores = $player->incrementGames();
        $userID = $player->getUserID();
        $statement->bindParam(':newTime', $newTime, PDO::PARAM_INT);
        $statement->bindParam(':newScores', $newScores, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();
    }

    function pullPlayerData($inputID): array
    {
        //1. Define the query
        $sql = "SELECT user_ID, total_scores, total_time FROM users where user_ID = :user_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        $userID = $inputID;
        $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function pullLeaderboardData() {
        //1. Define the query
        $sql = "SELECT shots, time, score, username FROM `scores`, users WHERE scores.user_id = users.user_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function pullCredentials($uname) {
        $sql = "SELECT * FROM `users` WHERE username = :username";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $username = $uname;
        $statement->bindParam(':username', $username, PDO::PARAM_STR);


        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }



}