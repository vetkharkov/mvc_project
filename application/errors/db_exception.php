<?php

/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.04.17
 * Time: 15:06
 */
class DBException extends Exception
{
    public function action()
    {
        echo $this->getMessage();
        die;
    }

}