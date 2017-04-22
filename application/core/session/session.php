<?php

class Session
{
    private static $obj;

    private $name;

    private $message_text;

    private function __construct()
    {
        if(empty($_SESSION)){
            session_start();
        }
    }

    public static function setValue($name, $val)
    {
        if (empty(self::$obj)) {
            self::$obj = new self();
        }
        self::$obj->name = $name;
        self::$obj->message_text = $val;
        $_SESSION["$name"] = self::$obj->message_text;
        return self::$obj;

    }

    public static function getValue($name)
    {
        if (self::$obj->existsValue($name)) {
            return self::$obj->message_text;
        }
        return "Not value <br>";

    }

    public static function deleteValue($name)
    {
        echo "delete session <br>";
        unset(self::$obj->name);
        unset($_SESSION["$name"]);
    }

    public static function existsValue($key)
    {
        return isset($_SESSION["$key"]);
    }

}
//---------------------------------------------
//Session::setValue("mes", 'ПРОВЕРКА');//->deleteValue("mes");
//Session::setValue("nas", 'ПРОВЕРКА7');//->deleteValue("nas");
//Session::setValue("nas", 'ПРОВ');//->deleteValue("nas");
//echo Session::getValue("nas") . "<br>";
//print_r($_SESSION);
//die;