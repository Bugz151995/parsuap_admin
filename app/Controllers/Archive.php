<?php

namespace App\Controllers;

class Archive extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Archive/index');
    echo view('templates/footer');
  }
}