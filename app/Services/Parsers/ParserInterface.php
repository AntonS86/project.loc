<?php


namespace App\Services\Parsers;


interface ParserInterface
{
    /**
     * @param \DateTime $lastDate
     *
     * @return array
     */
    public function getLast(\DateTime $lastDate): array;
}
