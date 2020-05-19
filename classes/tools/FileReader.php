<?php

namespace Classes\Tools;

use Exception;

class FileReader
{
    public $content = '';

    public function read($file)
    {
        $data = file_get_contents($file);
        if (!$data) {
            throw new Exception('File not found or something went wrong');
        }
        $this->content = $data;
    }

    public function getJsonDecoded()
    {
        $jsonDecoded = [];
        $lines = explode(PHP_EOL, $this->content);

        foreach ($lines as $content) {
            $jsonDecoded[] = json_decode($content);
        }
        return $jsonDecoded;
    }
}