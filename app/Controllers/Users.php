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

      $data = [
        'title' => 'Users List',
        // 'users' => $this->userModel->findAll(),
        'users' => $this->userModel->paginate(10, 'users'),
        'pager' => $this->userModel->pager,
        'currentPage' => $currentPage
      ];

      return view('users/index', $data);
    }
}
