<?php

class Flash
{

    private $flashMessage;

    private $nameMessage;

    private static $flashObj;

    private function __construct()
    {
    }

    public static function setMessage($name, $mes)
    {
        if (!isset(self::$flashObj)) {
            self::$flashObj = new self();
        }
        self::$flashObj->nameMessage = $name;
        self::$flashObj->flashMessage = $mes;

        Session::setValue($name, $mes);
    }

    public static function getMessage($key)
    {
        $message = '';
        if (Session::existsValue($key)) {
            $message = Session::getValue($key);
            Session::deleteValue($key);
//            session_unset();//удаляет все сессии
//            session_destroy();
//            unset ($_SESSION);//невозможно будет создать сессии в будущем
        }
        return $message;
    }

}

//---------------------------------------
Flash::setMessage("aaa", 'Проверка');
echo Flash::getMessage("aaa") . "<br>";//Вызывается только один раз
echo Flash::getMessage("aaa") . "<br>";//не показывает
echo Flash::getMessage("aaa") . "<br>";//нет такой сессии

echo Session::getValue("aaa") . "<br>";//Not value

print_r($_SESSION);
die;