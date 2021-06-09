<?php

class Player {
    private $_userID;
    private $_totalGames;
    private $_totalTime;

    /**
     * Player constructor.
     * @param $_userID
     * @param $_totalGames
     * @param $_totalTime
     */
    public function __construct($_userID, $_totalGames, $_totalTime)
    {
        $this->_userID = $_userID;
        $this->_totalGames = $_totalGames;
        $this->_totalTime = $_totalTime;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->_userID;
    }

    /**
     * @return mixed
     */
    public function getTotalGames()
    {
        return $this->_totalGames;
    }

    /**
     * @return mixed
     */
    public function getTotalTime()
    {
        return $this->_totalTime;
    }

    public function incrementGames() {
        $this->_totalGames++;
    }

    public function addTotalTime($OverallTime) {
        $this->_totalTime =+ $OverallTime;
    }


}