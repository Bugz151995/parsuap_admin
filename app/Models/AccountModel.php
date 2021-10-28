<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model {
  protected $table      = 'accounts';
  protected $primaryKey = 'account_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'request_at', 
    'status', 
    'alumni_id'
  ];

  /**
   * Get user request.
   *
   * @return mixed
   */
  public function getUserRequests() {
    return $this->select('profile, fname, lname, email, request_at, batch_type, status, alumni.alumni_id, account_id')
                ->join('alumni', 'alumni.alumni_id = accounts.alumni_id')
                ->join('batch', 'batch.alumni_id = alumni.alumni_id')
                ->where('status', 0)
                ->groupBy('alumni_id');
  }
}