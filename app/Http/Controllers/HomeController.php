<?php


namespace App\http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view(view: 'home');
    }
}
