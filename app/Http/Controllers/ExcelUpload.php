<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // set each line to an indexed array so we can loop over
        $users = array_map('str_getcsv', file(request()->excel_file));

        // set the header, lowercase them and remove the id
        $header = array_map('strtolower', $users[0]);
        unset($header[0]);

        // we don't need the header in the data anymore
        unset($users[0]);

        foreach ($users as $user) {
            // we don't need the id
            unset($user[0]);

            // we don't need the header in the data anymore
            unset($user[0]);

            // set user password


            // set each user array value with their associated keys
            User::create(array_combine($header, $user));
        }

        return 'Complete';
    }
}
