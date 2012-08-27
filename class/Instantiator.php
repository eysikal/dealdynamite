<?php
class Instantiator {

    public static function makeRouter() {
        require_once 'class/Database.php';
        $db = new Database();
        require_once 'class/Router.php';
        $router = new Router($db);
        return $router;
    }

    public static function makeDatabase() {
        require_once 'class/Database.php';
        return new Database();
    }
}
