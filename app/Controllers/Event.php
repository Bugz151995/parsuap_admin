<?php

namespace App\Controllers;

class Event extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/topnavbar');
        echo view('templates/sidenavbar');
        echo view('Event/index');
        echo view('templates/footer');
    }
}