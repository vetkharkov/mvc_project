<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 25.03.17
 * Time: 13:50
 */
// Включим вывод всех ошибок на экран.

// устанавливает уровень отслеживаемых ошибок интерпретатором php
error_reporting(E_ALL);

// дает команду интерпретатору php выводить все отслеживаемые ошибки в браузере
ini_set('display_errors', 1);

require_once '../application/boot.php';

?>