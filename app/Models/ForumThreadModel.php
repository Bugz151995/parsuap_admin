<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumThreadModel extends Model {
  protected $table      = 'forum_threads';
  protected $primaryKey = 'forum_thread_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'topic', 
    'created_at', 
    'status', 
    'alumni_id'
  ];

  /**
   * Fetch all threads.
   *
   * @return object
   */
  public function getThreads() {
    return $this->select('forum_threads.forum_thread_id, topic, created_at, status, fname, lname')
                ->select('(SELECT COUNT(post) FROM forum_posts WHERE forum_posts.forum_thread_id = forum_threads.forum_thread_id) AS posts')
                ->orderBy('posts', 'DESC')
                ->join('alumni', 'alumni.alumni_id = forum_threads.alumni_id');
  }

  /**
   * Fetch a specific thread.
   *
   * @param array $data
   * @return array
   */
  public function getThread($data) {
    return $this->select('forum_threads.forum_thread_id, topic, created_at, status, fname, lname')
                ->select('(SELECT COUNT(post) FROM forum_posts WHERE forum_posts.forum_thread_id = forum_threads.forum_thread_id) AS posts')
                ->orderBy('posts', 'DESC')
                ->where($data)
                ->join('alumni', 'alumni.alumni_id = forum_threads.alumni_id')
                ->get()->getRowArray();
  }
}