<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model {
  protected $table      = 'alumni';
  protected $primaryKey = 'alumni_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'fname', 
    'profile',
    'lname', 
    'birthdate', 
    'sex', 
    'cp_num', 
    'email', 
    'password'
  ];

  /**
   * Get user list.
   *
   * @return mixed
   */
  public function getUsers() {
    return $this->select('profile, fname, lname, email, request_at, batch_type, status, alumni.alumni_id, account_id')
                ->join('accounts', 'accounts.alumni_id = alumni.alumni_id')
                ->join('batch', 'batch.alumni_id = alumni.alumni_id')
                ->where('status != 0')
                ->groupBy('alumni_id');
  }

  /**
   * Get user list.
   *
   * @return mixed
   */
  public function searchUser($data) {
    return $this->select('profile, fname, lname, email, request_at, batch_type, status, alumni.alumni_id, account_id')
                ->join('accounts', 'accounts.alumni_id = alumni.alumni_id')
                ->join('batch', 'batch.alumni_id = alumni.alumni_id')
                ->like('fname',$data['fname'])
                ->orlike('lname',$data['lname'])
                ->where('status != 0')
                ->groupBy('alumni_id');
  }
}