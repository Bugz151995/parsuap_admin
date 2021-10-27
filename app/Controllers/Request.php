<?php

namespace App\Controllers;

class Request extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('request');
    echo view('templates/footer');
  }
}
