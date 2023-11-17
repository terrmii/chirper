<?php

namespace App\Http\Controllers;

use App\Models\UsersData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormInfor extends Controller
{
    public function index()
    {
        // Lógica para mostrar una lista de usuarios
        return view('formularioInformacion');
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    // Validación de los campos
    $request->validate([
        'Localidad' => 'required|string|max:255',
        'CodigoPostal' => 'required|max:255',
        'NumeroContacto' => 'required',
        'InformacionAdicional' => 'required',
        'UsersID' => 'required',
    ]);

    // Crear un nuevo usuario en la base de datos
    $usersData = new UsersData;
    //Variable local ->CampoEnLaBBDD = Variable ->input("nombre del name del formulario")
    $usersData->Localidad = $request->input('Localidad');
    $usersData->CodigoPostal = $request->input('CodigoPostal');
    $usersData->NumeroContacto = $request->input('NumeroContacto');
    $usersData->InformacionAdicional = $request->input('InformacionAdicional');
    $usersData->UsersID = $request->input('UsersID');
    // Guardar el usuario
    $usersData->save();


    // Redireccionar a la página de inicio u otra vista después de guardar
    return redirect('/');
}

}
