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

    function saveScore() {

    }

    function pullPlayerData(): array
    {
        //1. Define the query
        $sql = "SELECT user_ID, total_scores, total_time FROM users where user_ID = 1";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }




}