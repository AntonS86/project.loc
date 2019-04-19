<?php


namespace App\Services\Crosspostings;


interface PostingInterface
{
    /**
     * @param array query
     *
     * @return string
     */
    public function send(array $query): string;
}

