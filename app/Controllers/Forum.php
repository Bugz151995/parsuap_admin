<?php

namespace App\Controllers;

class Forum extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Forum/index');
    echo view('templates/footer');
  }
}