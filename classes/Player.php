<?php

/**
 * Class Player
 * Represents an Player object with _userID _totalGames _totalTime
 * @author Jean-Kenneth Antonio
 * @author George Mcmullen
 * @version 0.001
 */
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
    public function __construct($_userID = 0, $_totalGames=0, $_totalTime=0)
    {
        $this->_userID = $_userID;
        $this->_totalGames = $_totalGames;
        $this->_totalTime = $_totalTime;
    }

    /**
     * Gets user for player class
     * @return mixed
     */
    public function getUserID()
    {
        return $this->_userID;
    }

    /**
     * Sets user for player class
     * @param int|mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->_userID = $userID;
    }

    /**
     * Gets total games for player class
     * @return int|mixed
     */
    public function getTotalGames()
    {
        return $this->_totalGames;
    }

    /**
     * Sets total games for player class
     * @param int|mixed $totalGames
     */
    public function setTotalGames($totalGames): void
    {
        $this->_totalGames = $totalGames;
    }

    /**
     * Gets totaltime for player class
     * @return int|mixed
     */
    public function getTotalTime()
    {
        return $this->_totalTime;
    }

    /**
     * Sets total time for player class
     * @param int|mixed $totalTime
     */
    public function setTotalTime($totalTime): void
    {
        $this->_totalTime = $totalTime;
    }

    /**
     * Auto-increments counter for total games for player class
     * @param $totalGames
     * @return int
     */
    public function incrementGames() {
        $this->_totalGames = $this->_totalGames + 1;
        return $this->_totalGames;
    }

    /**
     * Auto-updates time for total time for player class
     * @param $time
     * @return int|mixed
     */
    public function updateTime($time) {
        $this->_totalTime = $this->_totalTime + $time;
        return $this->_totalTime;
    }
}