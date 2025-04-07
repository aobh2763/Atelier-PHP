<?php

class Session{
    private static $session = null;

    private function __construct(){
        session_start(); 
    }

    public static function getInstance(){
        if(session_status() == PHP_SESSION_NONE){
            Session::$session = new Session();
        }
        return Session::$session;
    }

    public function set($key, $value){
        $_SESSION[$key] = $value;
    }
    public function get($key){
        return $_SESSION[$key] ?? null;
    }
    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function clear(){
        session_unset();
    }
    public function destroy(){
        session_destroy();
    }
}

