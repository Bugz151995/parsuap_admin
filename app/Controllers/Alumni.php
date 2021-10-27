<?php

namespace App\Controllers;

class Alumni extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('alumni');
    echo view('templates/footer');
  }
}
