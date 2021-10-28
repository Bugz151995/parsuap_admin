<?php

namespace App\Controllers;

class Career extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Career/index');
    echo view('templates/footer');
  }
}