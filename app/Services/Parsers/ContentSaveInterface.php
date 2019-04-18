<?php


namespace App\Services\Parsers;


interface ContentSaveInterface
{

    /**
     * @param array $data
     *
     * @return bool
     */
    public function save(Array $data): bool;
}
