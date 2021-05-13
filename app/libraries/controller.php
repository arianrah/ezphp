<?php
// base controller
// loads models + views

class Controller
{
  // load model
  public function model($model)
  {
    // require specified model file
    require_once('../models/' . $model . '.php');

    // instatiate model
    return new $model();
  }
  public function view($view, $data = [])
  {
    // view exist check
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once('../app/views/' . $view . '.php');
    } else {
      // view does not exist
      die('View does not exist');
    }
  }
}
