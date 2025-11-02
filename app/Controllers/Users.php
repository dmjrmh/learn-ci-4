<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

    public function index()
    { 
      $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

      $keyword = $this->request->getVar('keyword');
      if ($keyword) {
        $users = $this->userModel->search($keyword);
      } else {
        $users = $this->userModel;
      }

      $data = [
        'title' => 'Users List',
        // 'users' => $this->userModel->findAll(),
        'users' => $users->paginate(10, 'users'),
        'pager' => $this->userModel->pager,
        'currentPage' => $currentPage
      ];

      return view('users/index', $data);
    }
}
