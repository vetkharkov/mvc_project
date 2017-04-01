<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 25.03.17
 * Time: 14:33
 */

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // контроллер и действие по умолчанию
        $controller_name =  !empty($routes[1]) ? $routes[1] : 'Main';
        $action_name = !empty($routes[2]) ? $routes[2] : 'index';

//        echo $_SERVER['HTTP_HOST'],"<br>";
//        echo "<pre>";
//            print_r($routes);
//        echo "</pre>"."<hr>";
//        die;

        // добавляем префиксы
        $model_name = $controller_name;
//        $model_class_name = ucfirst($controller_name);
        $controller_class_name = 'Controller'.ucfirst($controller_name);
        $controller_name = 'controller_'.$controller_name;

//        echo "Model: $model_name <br>";
//        echo "Controller file: $controller_name <br>";
//        echo "Controller_class: $controller_class_name <br>";
//        echo "Action: $action_name <br>";

        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name).'.php';
        $model_path = "../application/models/".$model_file;

//        print_r($model_file);
//        echo "<br>";
//        print_r($model_path);
//        die;

        if(file_exists($model_path))
        {
            include "../application/models/".$model_file;
        }
        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "../application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "../application/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_class_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
//        die;
    }


    }
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
//        die;
    }