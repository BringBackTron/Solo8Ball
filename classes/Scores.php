<?php

class Scores {
    private $_scoreID;
    private $_userID;
    private $_platform;
    private $_shots;
    private $_time;
    private $_overallScore; //probably going to be shots per second

    /**
     * Scores constructor.
     * @param $_scoreID
     * @param $_userID
     * @param $_platform
     * @param $_shots
     * @param $_time
     * @param $_overallScore
     */
    public function __construct($_scoreID, $_userID, $_platform, $_shots, $_time, $_overallScore)
    {
        $this->_scoreID = $_scoreID;
        $this->_userID = $_userID;
        $this->_platform = $_platform;
        $this->_shots = $_shots;
        $this->_time = $_time;
        $this->_overallScore = $_overallScore;
    }

    /**
     * @return mixed
     */
    public function getScoreID()
    {
        return $this->_scoreID;
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
    public function getPlatform()
    {
        return $this->_platform;
    }

    /**
     * @return mixed
     */
    public function getShots()
    {
        return $this->_shots;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @return mixed
     */
    public function getOverallScore()
    {
        return $this->_overallScore;
    }



}