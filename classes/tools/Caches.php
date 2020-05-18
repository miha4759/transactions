<?php

namespace Classes\Tools;

class Caches
{
    /** @property array $cache */
    public $cache;

    public function setValue($key, $value = null)
    {
        if (empty($key)) {
            return $this->cache += $key;
        }

        return $this->cache[$key] = $value;
    }

    public function getValue($key)
    {
        return isset($this->cache[$key]) ? $this->cache[$key] : false;
    }
}