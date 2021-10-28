<?php

namespace App\Controllers;

class Announcement extends BaseController
{
  public function index()
  {
    echo view('templates/header');
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Announcement/index');
    echo view('templates/footer');
  }
}
