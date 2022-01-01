<?php

class Discohook {
    private $url = null;

    public function __construct($url = 'https://discord.com/api/webhooks/926697868885131274/CrKNmGmKnXwJGKIlnzW1zjyqdLNSSVNYvPvV1xc1gSG76uYB6G6dWIlBAAql1Fabhvmp') {
        $this->url = $url;
    }

    public function log($message) {
        $headers = [ 'Content-Type: application/json; charset=utf-8' ];
        $POST = [ 'username' => 'Testing BOT', 'content' => 'Testing message' ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
        $response   = curl_exec($ch);
        return $response;
    }
}