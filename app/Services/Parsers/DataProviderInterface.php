<?php


namespace App\Services\Parsers;


interface DataProviderInterface
{
    /**
     * @param \DateTime $lastDate
     *
     * @return array
     */
    public function getLast(\DateTime $lastDate): array;
}
