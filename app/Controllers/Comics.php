<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicModel;

class Comics extends BaseController
{
  protected $comicModel;

  public function __construct()
  {
    $this->comicModel = new ComicModel();
  }

  public function index()
  {
    $comics = $this->comicModel->findAll();
    $data = [
      'title' => 'Comics List',
      'comics' => $this->comicModel->getComics(),
    ];
    // conntection without using model
    // $db = \Config\Database::connect();
    // $comics = $db->query("SELECT * FROM comics");
    // // dd($comics);
    // foreach ($comics->getResultArray() as $row) {
    //   d($row);
    // }

    // instansiasi class comicModel
    // $comic = new ComicModel();
    // dd($comic);

    return view('comics/index', $data);
  }

  public function detail($slug)
  {
    // $comic = $this->comicModel->getComics($slug);
    // dd($comic);

    $data = [
      'title' => 'Comic Detail',
      'comic' => $this->comicModel->getComics($slug),
    ]; 

    return view('comics/detail', $data);
  }
}
