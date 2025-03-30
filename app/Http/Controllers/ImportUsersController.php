<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ImportUsersController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('users_csv');

        $csvData = array_map('str_getcsv', file($file));
        array_shift($csvData); // Remove header row

        foreach ($csvData as $row) {
            User::create([
                'name' => $row[0],
                'email' => $row[1],
                'role' => $row[2],
                'password' => Hash::make('password123'), // Default password
            ]);
        }

        return back()->with('success', 'Users imported successfully!');
    }
}
