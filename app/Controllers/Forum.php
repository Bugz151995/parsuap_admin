<?php

namespace App\Controllers;

use \App\Models\ForumThreadModel;
use \App\Models\ForumPostModel;

class Forum extends BaseController
{
  /**
   * Display the list of forum threads.
   *
   * @return mixed
   */
  public function index()
  {
    helper('form');
    $threads = new ForumThreadModel();

    $data = [
      'threads' => $threads->getThreads()->paginate(15),
      'pager'   => $threads->pager
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Forum/index');
    echo view('templates/footer');
  }

  /**
   * Display the list of forum threads.
   *
   * @return mixed
   */
  public function view()
  {
    helper('form');
    $posts  = new ForumPostModel();
    $threads = new ForumThreadModel();

    $thread = [
      'forum_thread_id' => esc($this->request->getPost('t'))
    ];

    $data = [
      'posts'  => $posts->getPosts($thread)->paginate(15),
      'thread' => $threads->getThread($thread),
      'pager'  => $posts->pager
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Forum/posts');
    echo view('templates/footer');
  }
}