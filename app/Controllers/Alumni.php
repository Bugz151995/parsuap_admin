<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\AlumniModel;
use \App\Models\BatchModel;

class Alumni extends BaseController
{
  /**
   * Display the user list.
   *
   * @return mixed
   */
  public function index()
  {
    helper('form');
    $alumni = new AlumniModel();
    $batch  = new BatchModel();

    $data = [
      'alumni'  => $alumni->getUsers()->paginate(15),
      'a_batch' => $batch->findAll(),
      'pager'   => $alumni->pager
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Alumni/index');
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
    $alumni = new AlumniModel();
    $batch  = new BatchModel();

    $action = $this->request->getPost('action');
 
    $state = null;
    switch ($action) {
      case 'approve':
        $state = 'success';
        break;

      case 'delete':
        $state = 'danger';
        break;

      case 'block':
        $state = 'dark';
        break;
    }

    $data = [
      'alumni'    => $alumni->getUsers()->paginate(15),
      'a_batch'   => $batch->findAll(),
      'pager'     => $alumni->pager,
      'action'    => esc($action),
      'state'     => $state,
      'alumni_id' => esc($this->request->getPost('a')),
      'email'     => esc($this->request->getPost('e')),
    ];

    echo view('templates/header', $data);
    echo view('templates/topnavbar');
    echo view('templates/sidenavbar');
    echo view('Alumni/index');
    echo view('templates/footer');
    echo view('Alumni/confirm');
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
    $email->setSubject('Account Re-Approval - Partido State University');
    $email->setMessage('Good Day! Our Staff has approved your account, You can now log in you\'re Account.'); //your message here

    if ($email->send()) {
      $accounts->save($data);
      session()->setTempData('success', 'The User has been successfully approved!', 1);
      session()->setTempData('info', 'The User has been notified through email.', 1);
    } else {
      session()->setTempData('email', $email->printDebugger(['headers']), 1);
      session()->setTempData('error', 'The Email was not sent.', 1);
      session()->setTempData('info', 'The User was not approved.', 1);
    }

    return redirect()->to('users');
  }

  /**
   * Block the User.
   *
   * @return mixed
   */
  public function block()
  {
		helper('form');
    $accounts = new AccountModel();
    $email    = \Config\Services::email();

    $data = [
      'account_id' => esc($this->request->getPost('a')),
      'status'     => 2
    ];

    $useremail = $this->request->getPost('e');

    $email->setTo($useremail);
    $email->setSubject('Account Status - Partido State University');
    $email->setMessage('Good Day! Our Staff has blocked your account, You are temporarily banned from logging into the System. For any clarifications, Please Contact the Administrator.'); //your message here

    if ($email->send()) {
      $accounts->save($data);
      session()->setTempData('success', 'The User has been successfully blocked!', 1);
      session()->setTempData('info', 'The User has been notified through email.', 1);
    } else {
      session()->setTempData('email', $email->printDebugger(['headers']), 1);
      session()->setTempData('error', 'The Email was not sent.', 1);
      session()->setTempData('info', 'The User was not blocked.', 1);
    }

    return redirect()->to('users');
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
    return redirect()->to('users');
  }
}
