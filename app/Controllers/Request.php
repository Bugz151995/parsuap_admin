<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\AlumniModel;
use \App\Models\BatchModel;

class Request extends BaseController
{
  /**
   * Display the user request list.
   *
   * @return mixed
   */
  public function index()
  {
    helper('form');
    $accounts = new AccountModel();
    $batch    = new BatchModel();

    $data = [
      'accounts' => $accounts->getUserRequests()->paginate(15),
      'a_batch'  => $batch->findAll(),
      'pager'    => $accounts->pager
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Request/index');
    echo view('templates/footer');
  }

  /**
   * Display the confirm action modal.
   *
   * @return mixed
   */
  public function confirm()
  {
    helper('form');
    $accounts = new AccountModel();
    $batch    = new BatchModel();

    $action = $this->request->getPost('action');

    $state = null;
    switch ($action) {
      case 'approve':
        $state = 'success';
        break;

      case 'delete':
        $state = 'danger';
        break;
    }

    $data = [
      'accounts'  => $accounts->getUserRequests()->paginate(15),
      'a_batch'   => $batch->findAll(),
      'pager'     => $accounts->pager,
      'action'    => esc($action),
      'state'     => $state,
      'alumni_id' => esc($this->request->getPost('a')),
      'email'     => esc($this->request->getPost('e')),
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Request/index');
    echo view('templates/footer');
    echo view('Request/confirm');
  }

  /**
   * Approve the User.
   *
   * @return mixed
   */
  public function approve()
  {
		helper('form');
    $accounts = new AccountModel();
    $email    = \Config\Services::email();

    $data = [
      'account_id' => esc($this->request->getPost('a')),
      'status'     => 1
    ];

    $useremail = $this->request->getPost('e');

    $email->setTo($useremail);
    $email->setSubject('Account Approval Confirmation - Partido State University');
    $email->setMessage('Good Day! Our Staff has validated your account, and We would like to notify you that you\'re Account has been activated.'); //your message here

    if ($email->send()) {
      $accounts->save($data);
      session()->setTempData('success', 'The User has been successfully approved!', 1);
    } else {
      session()->setTempData('email', $email->printDebugger(['headers']), 1);
      session()->setTempData('error', 'The Email was not sent.', 1);
      session()->setTempData('info', 'The User was not approved.', 1);
    }

    return redirect()->to('request');
  }

  /**
   * Delete the User.
   *
   * @return mixed
   */
  public function delete()
  {
    helper('form');
    $alumni = new AlumniModel();
    $data = [
      'alumni_id' => esc($this->request->getPost('a'))
    ];

    $alumni->delete($data);
    session()->setTempData('info', 'The User has been successfully deleted!', 1);
    return redirect()->to('request');
  }

  /**
   * Delete the User.
   *
   * @return mixed
   */
  public function search()
  {
    $validation =  \Config\Services::validation();

    if(!$this->validate($validation->getRuleGroup('search_rule'))){
      session()->setTempData('warning', 'Please input the name that you want to search before you click the search button.', 1);
      return redirect()->to('request');
    } else {
      helper('form');
      $accounts = new AccountModel();
      $batch    = new BatchModel();
      $search = [
        'fname' => esc($this->request->getPost('s')),
        'lname' => esc($this->request->getPost('s'))
      ];

      $data = [
        'accounts' => $accounts->searchUserRequest($search)->paginate(15),
        'a_batch'  => $batch->findAll(),
        'pager'    => $accounts->pager
      ];

      session()->setTempData('info', 'The System has found '.count($data['alumni']).' data!', 1);
      echo view('templates/header', $data);
      echo view('templates/topnavbar');
      echo view('templates/sidenavbar');
      echo view('Request/index');
      echo view('templates/footer');
    }
  }
}
