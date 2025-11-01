<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home Page',
    ];
    echo view('layouts/header', $data);
    echo view('pages/home');
    echo view('layouts/footer');
  }
  public function about()
  {
    // return view('pages/about');
    $data = [
      'title' => 'About',
      'test' => [1, 2, 3, 4, 5]
    ];
    echo view('layouts/header', $data);
    echo view('pages/about');
    echo view('layouts/footer');
  }

  public function contact()
  {
    echo view('layouts/header');
    echo view('pages/contact');
    echo view('layouts/footer');
  }
}
