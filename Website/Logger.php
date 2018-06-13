<?php
/**
 * Created by PhpStorm.
 * User: Radoslav
 * Date: 13-Jun-18
 * Time: 18:58
 */

class Logger
{


    public static $method = null;
    public static $endpoint = null;
    public static $filename = "data.log";

    private static function initialize()
    {
        if (isset($_SESSION['method'])) {
            self::$method = $_SESSION['method'];
        } else {
            self::$method = "file";
            self::$filename = "data.log";

        }

        if (isset($_SESSION['endpoint'])) {
            self::$endpoint = $_SESSION['endpoint'];
        }

        if (isset($_SESSION['filename'])) {
            self::$filename = $_SESSION['filename'];
        }

    }

    static function log($data)
    {

        self::initialize();
        if (self::$method == null){
            self::$method = "file";
        }
        switch (self::$method) {
            case "file":
                self::write_to_file($data);
                break;
            case "remote":
                if (self::$endpoint != null) {
                    self::request_to_endpoint($data);
                }
                break;
        }

    }

    private static function write_to_file($data)
    {
        file_put_contents(self::$filename, $data, FILE_APPEND);
    }

    private static function request_to_endpoint($data)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query(array('data' => $data))
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents(self::$endpoint, false, $context);

    }

}