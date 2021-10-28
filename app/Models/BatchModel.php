<?php

namespace App\Models;

use CodeIgniter\Model;

class BatchModel extends Model {
  protected $table      = 'batch';
  protected $primaryKey = 'batch_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'batch_type', 
    'batch_year', 
    'alumni_id'
  ];

  /**
   * Get user request.
   *
   * @return mixed
   */
  public function getUserRequests() {
    return $this->select('*')
                ->join('alumni', 'alumni.alumni_id = accounts.alumni_id');
  }
}