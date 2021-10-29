<?php

namespace App\Controllers;

use \App\Models\ArchiveModel;

class Archive extends BaseController
{
  public function index()
  {
    helper('form');
    $archive = new ArchiveModel();
    $data = [
      'archive' => $archive->paginate(15),
      'pager'   => $archive->pager
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Archive/index');
    echo view('templates/footer');
  }
}