<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return response()->view('welcome');
    }

    public function homepage()
    {

    }
}
