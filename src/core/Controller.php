<?php

namespace Metakomputer\core;

class Controller
{
  public function view($app, $dir, $models)
  {
    require __DIR__ . '/../'. $app .'/views/header.php';
    require __DIR__ . '/../'. $app .'/views/' . $dir . '/index.php';
    require __DIR__ . '/../'. $app .'/views/footer.php';

  }

  public function model($model)
  {
    return new $model;
  }
}