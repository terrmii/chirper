<!DOCTYPE html> <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<style>
  body{

color: #9b9ca1;
}
.bg-secondary-soft {
    background-color: rgba(208, 212, 217, 0.1) !important;
}
.rounded {
    border-radius: 5px !important;
}
.py-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
.file-upload .square {
    height: 250px;
    width: 250px;
    margin: auto;
    vertical-align: middle;
    border: 1px solid #e5dfe4;
    background-color: #fff;
    border-radius: 5px;
}
.text-secondary {
    --bs-text-opacity: 1;
    color: rgba(208, 212, 217, 0.5) !important;
}
.btn-success-soft {
    color: #28a745;
    background-color: rgba(40, 167, 69, 0.1);
}
.btn-danger-soft {
    color: #dc3545;
    background-color: rgba(220, 53, 69, 0.1);
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.6;
    color: #29292e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e5dfe4;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 5px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
</style>
</head>

<body class="antialiased">
  <!-- Barra de navegacion -->
  @auth
  @include('layouts.navigation')
  @endauth

  <div>
    @if (Route::has('login'))
    <div class="sm:top-0 sm:right-0 p-6 text-right z-10">
      @auth
      <a href="{{ url('/logout') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
        out</a>
      @else
      <a href="{{ route('login') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
        in</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}"
        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
      @endif
      @endauth
    </div>
    @endif

    @auth
    <div class="container">
            <div class="text-gray-900 mb-5">
              {{ __("Te has logueado correctamente!") }}
            </div>
            <a href="{{ route('formularioInformacion') }}"><button style="background-color:dimgrey; border-radius:100px; padding:0.7em;">Termine de registrarse</button></a>

    </div>

    </div>
    @else
    <div>
      <a style ="margin-left:3em;">Registrese para poder ver su informacion.</a>
    </div>
    @endauth

    </div>

    <!-- Nuevo dashboard de usuario -->

    @auth
    <div class="container">
      <!-- Hacer el select con el fk recogiendo la id del usuario con el cual hemos iniciado sesion -->
    @php
      $resultados = DB::select('SELECT Localidad, CodigoPostal, NumeroContacto, InformacionAdicional FROM usersData
      WHERE UsersID = ' . auth()->id());
    @endphp

    @foreach ($resultados as $resultado)
      <div class="row">
        <div class="col-12">
          <!-- Page title -->
          <div class="my-5">
            <h3>Mi Perfil</h3>
            <hr>
          </div>
          <div class="file-upload">
            
          
            <div class="row mb-5 gx-5">
              <!-- Contact detail -->
              <div class="col-xxl-8 mb-5 mb-xxl-0">
                <div class="bg-secondary-soft px-4 py-5 rounded">

                  <form action="{{ route('editar') }}" method="post" id="formEditar">
                    @csrf
                    <div class="row g-3">
                      <h4 class="mb-4 mt-0">Datos de perfil</h4>
                      <!-- Nombre -->
                      <div class="col-md-6">
                        <label class="form-label">Nombre *</label>
                        <input type="text" disabled class="form-control" value="{{ Auth::user()->name }}">
                      </div>
                      <!-- Localidad -->
                      <div class="col-md-6">
                        <label class="form-label">Localidad</label>
                        <input type="text" class="form-control"aria-label="Last name" name="Localidad" value="{{ $resultado->Localidad }}">
                      </div>
                      <!-- Codigo Postal -->
                      <div class="col-md-6">
                        <label class="form-label">Codigo Postal</label>
                        <input type="text" class="form-control" name="CodigoPostal" aria-label="Phone number"
                          value="{{ $resultado->CodigoPostal }}">
                      </div>
                      <!-- Numero de contacto -->
                      <div class="col-md-6">
                        <label class="form-label">Numero de contacto</label>
                        <input type="text" class="form-control" name="NumeroContacto" aria-label="Telefono"
                          value="{{ $resultado->NumeroContacto }}">
                      </div>
                      <!-- Informacion adicional -->
                      <div class="col-md-6">
                        <label class="form-label">Informacion adicional</label>
                        <input type="text" class="form-control" name="InformacionAdicional" aria-label="Informacion Adicional"
                          value="{{ $resultado->InformacionAdicional }}">
                      </div>
                    </div> <!-- Row END -->
                  </form>   

                </div>
              </div>
              <!-- Upload profile -->
              <div class="col-xxl-4">
                <div class="bg-secondary-soft px-4 py-5 rounded">
                  <div class="row g-3">
                    <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                    <div class="text-center">
                      <!-- Image upload -->
                      <div class="square position-relative display-2 mb-3">
                        <i
                          class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
                      </div>
                      <!-- Button -->
                      <input type="file" id="customFile" name="file" hidden="">
                      <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                      <button type="button" class="btn btn-danger-soft">Remove</button>
                      <!-- Content -->
                      <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Row END -->

            <!-- button -->
            <div class="gap-3 d-md-flex justify-content-md-end text-center">
              <!-- ELIMINAR -->
              <form action="{{ route('eliminar') }}" method="post">
              @csrf
              @method('DELETE')

              <button class="btn btn-danger btn-lg" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar tus datos?')">Eliminar mis datos</button>
              </form>

              <!-- BOTON EDITAR -->
              <button class="btn btn-info btn-lg" form="formEditar" type="submit">Editar mis datos</button>            
              
              
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endauth

</body>

</html>