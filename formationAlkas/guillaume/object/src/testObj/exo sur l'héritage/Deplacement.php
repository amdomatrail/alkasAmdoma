<?php
require_once ('throwtrycatch.php');


class Deplacement
{
    public function __construct(private int $accelerer = 0, private int $avancer = 0, private int $freiner = 0)
    {

    }

    /**
     * @return int
     */

    public function getAccelerer(): string
    {
        return $this->accelerer;
    }

    /**
     * @param int $accelerer
     */
    public function setAccelerer(int $accelerer): void

    {
        $vit = $accelerer;
        $this->accelerer = $accelerer;
    }

    /**
     * @return int
     */
    public function getAvancer(): string
    {
        return $this->avancer;
    }

    /**
     * @param int $avancer
     */
    public function setAvancer(int $avancer): void
    {
        $this->avancer = $avancer;
    }

    /**
     * @return int
     */
    public function getFreiner(): string
    {
        return $this->freiner;
    }

    /**
     * @param int $freiner
     */
    public function setFreiner(int $freiner): void
    {
        $this->freiner = $freiner;
    }

    public function getDeplacement(): string
    {
        return "<br>Accélerer :" . $this->accelerer . "<br>Avancer:" . $this->avancer . "<br>Freiner :" . $this->freiner;
    }
}