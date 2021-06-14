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
    public function __construct($_userID = 0, $_totalGames=0, $_totalTime=0)
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
     * @param int|mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->_userID = $userID;
    }

    /**
     * @return int|mixed
     */
    public function getTotalGames()
    {
        return $this->_totalGames;
    }

    /**
     * @param int|mixed $totalGames
     */
    public function setTotalGames($totalGames): void
    {
        $this->_totalGames = $totalGames;
    }

    /**
     * @return int|mixed
     */
    public function getTotalTime()
    {
        return $this->_totalTime;
    }

    /**
     * @param int|mixed $totalTime
     */
    public function setTotalTime($totalTime): void
    {
        $this->_totalTime = $totalTime;
    }

    /**
     * @param $totalGames
     * @return int
     */
    public function incrementGames() {
        $this->_totalGames = $this->_totalGames + 1;
        return $this->_totalGames;
    }

    /**
     * @param $time
     * @return int|mixed
     */
    public function updateTime($time) {
        $this->_totalTime = $this->_totalTime + $time;
        return $this->_totalTime;
    }
}