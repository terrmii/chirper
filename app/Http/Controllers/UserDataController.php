<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersData;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function index()
    {
        $userData = UsersData::all();

        return view('welcome', ['userData' => $userData]);
    }

    public function destroy()
    {
        UsersData::where('UsersID', Auth::user()->id)->delete();
        return view('welcome');

    }

    
}
