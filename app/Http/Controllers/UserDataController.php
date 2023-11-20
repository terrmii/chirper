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

    public function edit(Request $request)
    {
        UsersData::where('UsersID', Auth::user()->id)->update(
            ['Localidad' => $request->input('Localidad'),
            'CodigoPostal' => $request->input('CodigoPostal'), 
            'NumeroContacto' => $request->input('NumeroContacto'),
            'InformacionAdicional' => $request->input('InformacionAdicional'), ]);

            return view('welcome');
    }

    public function destroy()
    {
        UsersData::where('UsersID', Auth::user()->id)->delete();
        return view('welcome');

    }
    

    
}
