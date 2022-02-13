<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelUpload extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function store()
    {
        request()->validate([
            'excel_file' => ['required', 'mimes:xlx,xls,csv', 'max:40000']
        ]);

        $data = array_map('str_getcsv', file(request()->excel_file));
        $header = $data[0];
        unset($data[0]);
        return $data;
    }
}
