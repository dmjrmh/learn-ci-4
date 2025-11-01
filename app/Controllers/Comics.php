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
    // session();
    $data = [
      'title' => 'Create Comic Form',
      'validation' => \Config\Services::validation(),
    ];

    return view('comics/create', $data);
  }

  public function store()
  {
    // dd($this->request->getVar());

    // validation input
    if (!$this->validate([
      'title' => 'required|is_unique[comics.title]',
      'author' => 'required',
      'publisher' => 'required',
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'The cover image size is too large. Maximum size is 1MB.',
          'is_image' => 'The file you uploaded is not a valid image.',
          'mime_in' => 'The cover image must be a file of type: jpg, jpeg, png.',
        ],
      ],
    ])) {
      // $validation = \Config\Services::validation();
      // dd($validation);
      // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
      return redirect()->to('/comics/create')->withInput();
    }

    // dd('success');
    // take picture
    $fileCover = $this->request->getFile('cover');

    if ($fileCover->getError() == 4) {
      $nameCover = 'missing-cover.jpg';
    } else {
      // get file cover
      $nameCover = $fileCover->getRandomName();

      // move to folder images
      $fileCover->move('images', $nameCover);
    }


    $slug = url_title($this->request->getVar('title'), '-', true);

    $this->comicModel->save([
      'title' => $this->request->getVar('title'),
      'slug' => $slug,
      'author' => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'cover' => $nameCover,
    ]);

    session()->setFlashdata('message', "Comic " . $this->request->getVar('title') . " added successfully");

    return redirect()->to('/comics');
  }

  public function delete($id)
  {
    $comic = $this->comicModel->find($id);

    // check if cover is default
    if ($comic['cover'] != 'missing-cover.jpg') {
      // delete image
      unlink('images/' . $comic['cover']);
    }


    $this->comicModel->delete($id);
    session()->setFlashdata('message', "Comic deleted successfully");
    return redirect()->to('/comics');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Comic Form',
      'validation' => \Config\Services::validation(),
      'comic' => $this->comicModel->getComics($slug),
    ];

    return view('comics/edit', $data);
  }

  public function update($id)
  {
    // dd($this->request->getVar());

    // check title old vs new
    $oldComicTitle = $this->comicModel->getComics($this->request->getVar('slug'));
    if ($oldComicTitle['title'] == $this->request->getVar('title')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[comics.title]';
    }

    if (!$this->validate([
      'title' => $rule_title,
      'author' => 'required',
      'publisher' => 'required',
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'The cover image size is too large. Maximum size is 1MB.',
          'is_image' => 'The file you uploaded is not a valid image.',
          'mime_in' => 'The cover image must be a file of type: jpg, jpeg, png.',
        ],
      ],
    ])) {
      // $validation = \Config\Services::validation();
      return redirect()->to('/comics/edit/' . $this->request->getVar('slug'))->withInput();
    }
    $fileCover = $this->request->getFile('cover');
    // check image, is the image still same ?

    if($fileCover->getError() == 4){
      $nameCover = $this->request->getVar('oldCover');
    } else {
      // get file cover
      $nameCover = $fileCover->getRandomName();

      // move to folder images
      $fileCover->move('images', $nameCover);

      // delete old image
      if($this->request->getVar('oldCover') != 'missing-cover.jpg'){
        unlink('images/' . $this->request->getVar('oldCover'));
      }
    }

    $slug = url_title($this->request->getVar('title'), '-', true);

    $this->comicModel->save([
      'id' => $id,
      'title' => $this->request->getVar('title'),
      'slug' => $slug,
      'author' => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'cover' => $nameCover,
    ]);

    session()->setFlashdata('message', "Comic " . $this->request->getVar('title') . " updated successfully");

    return redirect()->to('/comics');
  }
}
