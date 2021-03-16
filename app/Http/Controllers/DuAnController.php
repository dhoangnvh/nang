<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuAnController extends Controller
{
    public function index()
    {
        return view('project.add');
    }
}
