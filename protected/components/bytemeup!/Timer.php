<?php
/**
 * Class that help calcutates the interval between instance/start of this class 
 * and callback of end function
 */
class Timer {

    var $startTime;
    var $started;

    /**
     * Intance of the Timer class
     * @param type $start
     */
    public function __construct($start = true) {
        $this->started = false;
        if ($start)
            $this->start();
    }

    /**
     * Start the timing
     */
    public function start() {
        $startMtime = explode(' ', microtime());
        $this->startTime = (double) ($startMtime[0]) + (double) ($startMtime[1]);
        $this->started = true;
    }

    /**
     * End the timing
     * @param integer $iterations iterations
     * @return string status of interval in miliseconds
     */
    public function end($iterations = 1) {
        $endMtime = explode(' ', microtime());
        if ($this->started) {
            $endTime = (double) ($endMtime[0]) + (double) ($endMtime[1]);
            $dur = $endTime - $this->startTime;
            $avg = 1000 * $dur / $iterations;
            $avg = round(1000 * $avg) / 1000;
            return "$avg milliseconds";
        } else {
            return "timer not started";
        }
    }

}

?>
