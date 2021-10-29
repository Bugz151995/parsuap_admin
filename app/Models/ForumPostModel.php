<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumPostModel extends Model {
  protected $table      = 'forum_posts';
  protected $primaryKey = 'forum_post_id';
  protected $returnType = 'array';

  protected $allowedFields = [
    'post_code', 
    'post', 
    'posted_at', 
    'upvotes', 
    'alumni_id', 
    'forum_thread_id'
  ];

  /**
   * Fetch the list of post in a thread.
   *
   * @param array forum_thread_id
   * @return object
   */
  public function getPosts($data) {
    return $this->select('forum_posts.forum_post_id, post_code, post, posted_at, fname, lname')
                ->select('(SELECT COUNT(forum_post_id) FROM forum_post_upvotes WHERE forum_post_upvotes.forum_post_id = forum_posts.forum_post_id) AS upvotes')
                ->join('alumni', 'alumni.alumni_id = forum_posts.alumni_id')
                ->join('forum_post_upvotes', 'forum_post_upvotes.forum_post_id = forum_posts.forum_post_id', 'left')
                ->orderBy('upvotes', 'DESC')
                ->where($data);
  }
}