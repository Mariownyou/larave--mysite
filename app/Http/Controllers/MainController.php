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

    public function file_upload(Request $request, $folder = 'posts') {
        request()->validate([
            'file'  => 'required|mimes:doc,docx,pdf,txt,png,jpg|max:2048',
        ]);

        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('public/'.$folder.'/img');

            //store your file into database
            //$document = new Document();
            //$document->title = $file;
            //$document->save();

            return Response()->json([
                "success" => true,
                "file" => $file
            ]);

        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }
}
