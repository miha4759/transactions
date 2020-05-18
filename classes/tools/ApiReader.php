<?php

namespace Classes\Tools;

class ApiReader
{
    public $content = '';

    public function get($url)
    {
        $data = file_get_contents($url);
        $this->content = $data ? $data : false;
    }

    public function getJsonDecoded($assoc = false)
    {
        return json_decode($this->content, $assoc);
    }
}