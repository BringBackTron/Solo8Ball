<?php

/**
 * Class EightBallPlayer
 * Represents an EighBallPlayer object with score time and shots
 * @author Jean-Kenneth Antonio
 * @author George Mcmullen
 * @version 0.001
 */
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
     * Gets score from Eight Ball Player object
     * @return int|mixed
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * Sets score for Eight Ball Player object
     * @param int|mixed $score
     */
    public function setScore($score): void
    {
        $this->_score = $score;
    }

    /**
     * Gets time from Eight Ball Player object
     * @return int|mixed
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * Sets time for Eight Ball Player object
     * @param int|mixed $time
     */
    public function setTime($time): void
    {
        $this->_time = $time;
    }

    /**
     * Gets shots from Eight Ball Player object
     * @return int|mixed
     */
    public function getShots()
    {
        return $this->_shots;
    }

    /**
     * Sets shots for Eight Ball Player object
     * @param int|mixed $shots
     */
    public function setShots($shots): void
    {
        $this->_shots = $shots;
    }

}