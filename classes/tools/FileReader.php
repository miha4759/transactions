<?php

namespace Classes\Tools;

class FileReader
{
    public $content = '';

    public function read($file)
    {
        $data = file_get_contents($file);
        $this->content = $data ? $data : false;
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