<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.04.17
 * Time: 12:11
 */
class Controller404 extends Controller
{

    function index()
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }
}