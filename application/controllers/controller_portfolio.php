<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.04.17
 * Time: 14:34
 */
class ControllerPortfolio extends Controller
{
    function __construct()
    {
        $this->model = new Portfolio();
//        $this->view = new View();
        parent::__construct();
    }

    function index()
    {
        $data = $this->model->get_data();
        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
}