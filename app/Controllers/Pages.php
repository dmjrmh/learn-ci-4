<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home Page',
    ];
    // echo view('layouts/header', $data);
    return view('pages/home', $data);
    // echo view('layouts/footer');
  }
  public function about()
  {
    // return view('pages/about');
    $data = [
      'title' => 'About',
      'test' => [1, 2, 3, 4, 5]
    ];
    return view('pages/about', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact',
      'address' => [
        [
          'type' => 'Home',
          'address' => '123 Home Street, Hometown, HT 12345'
        ],
        [
          'type' => 'Office',
          'address' => '456 Office Blvd, Worktown, WT 67890'
        ]
      ]
    ];
    return view('pages/contact', $data);
  }
}
