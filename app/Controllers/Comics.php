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

    // if comic not found
    if (empty($data['comic'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic with slug ' . $slug . ' not found.');
    };

    return view('comics/detail', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Create Comic Form',
    ];

    return view('comics/create', $data);
  }

  public function store()
  {
    // dd($this->request->getVar());

    $slug = url_title($this->request->getVar('title'), '-', true);

    $this->comicModel->save([
      'title' => $this->request->getVar('title'),
      'slug' => $slug,
      'author' => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'cover' => $this->request->getVar('cover'),
    ]);

    session()->setFlashdata('message', "Comic " . $this->request->getVar('title'). " added successfully");

    return redirect()->to('/comics');
  }

}
