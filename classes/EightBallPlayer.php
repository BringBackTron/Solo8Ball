<?php

class EightBallPlayer extends Player {
    private $_score;
    private $_time;
    private $_shots;

    /**
     * EightBallPlayer constructor.
     * @param $_score
     * @param $_time
     * @param $_shots
     */
    public function __construct($_score=0, $_time=0, $_shots=0)
    {
        parent::__construct();
        $this-> _score= $_score;
        $this->_time = $_time;
        $this->_shots = $_shots;
    }

    /**
     * @return int|mixed
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * @param int|mixed $score
     */
    public function setScore($score): void
    {
        $this->_score = $score;
    }

    /**
     * @return int|mixed
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @param int|mixed $time
     */
    public function setTime($time): void
    {
        $this->_time = $time;
    }

    /**
     * @return int|mixed
     */
    public function getShots()
    {
        return $this->_shots;
    }

    /**
     * @param int|mixed $shots
     */
    public function setShots($shots): void
    {
        $this->_shots = $shots;
    }

}