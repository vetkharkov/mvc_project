<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 25.03.17
 * Time: 14:11
 */

class View
{

    //public $template_view; // здесь можно указать общий вид по умолчанию.

    /*
    $content_view - виды отображающие контент страниц;
    $template_view - общий для всех страниц шаблон;
    $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
    */
    function generate($content_view, $template_view, $data = null)
    {

        /*
        if(is_array($data)) {

            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        /*
        динамически подключаем общий шаблон (вид),
        внутри которого будет встраиваться вид
        для отображения контента конкретной страницы.
        */
        include '../application/views/'.$template_view;
    }
}