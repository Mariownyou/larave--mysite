<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function school() {
        return view('pages.school');
    }

    public function search() {
        return view('pages.search');
    }
}
