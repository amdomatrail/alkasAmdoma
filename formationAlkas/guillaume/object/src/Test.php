<?php

class Test
{
    public int $nombre1;
    public int $nombre2;
    public int $total;

    public function __construct(int $nombre1,int $nombre2)
    {
        $this->nombre1=$nombre1;
        $this->nombre2=$nombre2;
    }

    /**
     * @return string
     */
    public function getTotal(): int
    {
        return $this->total = $this ->nombre1 * $this ->nombre2;
    }

    /**
     * @param string $nombre1
     */
    public function setNombre1(string $nombre1): void
    {
        $this->nombre1 = $nombre1;
    }
    public function setNombre2(string $nombre2): void
    {
        $this->nombre2 = $nombre2;
    }
}