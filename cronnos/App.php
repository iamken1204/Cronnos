<?php
namespace cronnos;

class App
{
    /**
     * app's config
     * @var array
     */
    public static $config;

    /**
     * app's database class: medoo
     * @var object
     */
    public static $db;

    public function __construct()
    {
        try {
            self::$config = require(__DIR__ . "/../config/config.php");
            if (empty(self::$config))
                throw new \Exception("config loading error!", 400);
            self::$db = new \medoo(self::$config['db']);
            if (empty(self::$db))
                throw new \Exception("medoo initializing error!", 401);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

$app = new App();
