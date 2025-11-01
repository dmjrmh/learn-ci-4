<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function about($name, $age = 0)
    {
        echo "This is about page and my name is ".$name . " age ".$age;
    }
}
