<?php

/**
 * Base Controller
 * Loads the models and views
*/
class Controller 
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function view($view, $data = [], $includeHeader = true, $includeFooter = true)
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            if ($includeHeader) require_once '../app/views/inc/header.php';
            require_once '../app/views/' . $view . '.php';
            if ($includeFooter) require_once '../app/views/inc/footer.php';
        } else {
            die('View does not exist');
        }
    }
} 