<?php

namespace Classes\Tools;

use Exception;

class ApiReader
{
    public $content = '';

    public function get($url)
    {
        $data = file_get_contents($url);
        if (!$data) {
            throw new Exception('Api isn\'t responding or something went wrong');
        }
        $this->content = $data;
    }

    public function getJsonDecoded($assoc = false)
    {
        return json_decode($this->content, $assoc);
    }
}