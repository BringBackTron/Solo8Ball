<?php

class EightBallPlayer extends Player {
    private $_overallScore;
    private $_overallTime;
    private $_time;
    private $_shots;

    /**
     * EightBallPlayer constructor.
     * @param $_overallScore
     * @param $_overallTime
     * @param $_time
     * @param $_shots
     */
    public function __construct($_overallScore=0, $_overallTime=0, $_time=0, $_shots=0)
    {
        parent::__construct();
        $this->_overallScore = $_overallScore;
        $this->_overallTime = $_overallTime;
        $this->_time = $_time;
        $this->_shots = $_shots;
    }

    /**
     * @return mixed
     */
    public function getOverallScore()
    {
        return $this->_overallScore;
    }

    /**
     * @return mixed
     */
    public function getOverallTime()
    {
        return $this->_overallTime;
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
    public function getShots()
    {
        return $this->_shots;
    }




}