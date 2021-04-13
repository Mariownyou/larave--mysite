<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function logout() {
        Auth::logout();

        return response(['status' => 'logged out'], 200);
    }

    public function school() {
        return view('pages.school');
    }

    public function search() {
        return view('pages.search');
    }
}
