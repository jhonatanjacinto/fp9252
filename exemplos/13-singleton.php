<?php

class Config
{
    private static $instance;

    private function __construct() { }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConfiguracao()
    {
        return array('Config1', 'Config2');
    }
}

$app = Config::getInstance();
$app2 = Config::getInstance();

var_dump($app === $app2);