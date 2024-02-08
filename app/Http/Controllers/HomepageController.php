<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function aboutus()
    {
        return view('homepage.aboutus');
    }

    public function products()
    {
        return view('homepage.products');
    }

    public function contactus()
    {
        return view('homepage.contactus');
    }
}
