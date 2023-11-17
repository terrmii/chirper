<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.5">
  <title>Formulario Informacion Adicional</title>
</head>
<style>
  *,
  *:before,
  *:after {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  body {
    background: linear-gradient(to right, #ea1d6f 0%, #eb466b 100%);
    font-size: 12px;
  }

  body,
  button,
  input {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    letter-spacing: 1.4px;
  }

  .background {
    display: flex;
    min-height: 90vh;
  }

  .container {
    flex: 0 1 950px;
    margin: auto;
    padding: 10px;
  }

  .screen {
    position: relative;
    background: #3e3e3e;
    border-radius: 15px;
  }

  .screen:after {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 20px;
    right: 20px;
    bottom: 0;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
    z-index: -1;
  }

  .screen-header {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    background: #4d4d4f;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }

  .screen-header-left {
    margin-right: auto;
  }

  .screen-header-button {
    display: inline-block;
    width: 8px;
    height: 8px;
    margin-right: 3px;
    border-radius: 8px;
    background: white;
  }

  .screen-header-button.close {
    background: #ed1c6f;
  }

  .screen-header-button.maximize {
    background: #e8e925;
  }

  .screen-header-button.minimize {
    background: #74c54f;
  }

  .screen-header-right {
    display: flex;
  }

  .screen-header-ellipsis {
    width: 3px;
    height: 3px;
    margin-left: 2px;
    border-radius: 8px;
    background: #999;
  }

  .screen-body {
    display: flex;
  }

  .screen-body-item {
    flex: 1;
    padding: 50px;
  }

  .screen-body-item.left {
    display: flex;
    flex-direction: column;
  }

  .app-title {
    display: flex;
    flex-direction: column;
    position: relative;
    color: #ea1d6f;
    font-size: 32px;
  }

  .app-title:after {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 25px;
    height: 4px;
    background: #ea1d6f;
  }

  .app-contact {
    margin-top: auto;
    font-size: 12px;
    color: #888;
  }

  .app-form-group {
    margin-bottom: 15px;
  }

  .app-form-group.message {
    margin-top: 40px;
  }

  .app-form-group.buttons {
    margin-bottom: 0;
    text-align: right;
  }

  .app-form-control {
    width: 100%;
    padding: 14px 10px;
    background: none;
    border: none;
    border-bottom: 1px solid #666;
    color: #ddd;
    font-size: 14px;
    text-transform: capitalize;
    outline: none;
    transition: border-color .2s;
  }

  .app-form-control::placeholder {
    color: #666;
  }

  .app-form-control:focus {
    border-bottom-color: #ddd;
  }

  .app-form-button {
    background: none;
    border: none;
    color: #ea1d6f;
    font-size: 14px;
    cursor: pointer;
    outline: none;
  }

  .app-form-button:hover {
    color: #b9134f;
  }

  .credits {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    color: #ffa4bd;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 16px;
    font-weight: normal;
  }

  .credits-link {
    display: flex;
    align-items: center;
    color: #fff;
    font-weight: bold;
    text-decoration: none;
  }

  .dribbble {
    width: 20px;
    height: 20px;
    margin: 0 5px;
  }

  @media screen and (max-width: 520px) {
    .screen-body {
      flex-direction: column;
    }

    .screen-body-item.left {
      margin-bottom: 30px;
    }

    .app-title {
      flex-direction: row;
    }

    .app-title span {
      margin-right: 12px;
    }

    .app-title:after {
      display: none;
    }
  }

  @media screen and (max-width: 600px) {
    .screen-body {
      padding: 40px;
    }

    .screen-body-item {
      padding: 0;
    }
  }
</style>

<body>
  <div class="background">
    <div class="container">
      <div class="screen">
        <div class="screen-header">
          <div class="screen-header-left">
            <div class="screen-header-button close"></div>
            <div class="screen-header-button maximize"></div>
            <div class="screen-header-button minimize"></div>
          </div>
          <div class="screen-header-right">
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
          </div>
        </div>
        <div class="screen-body">
          <div class="screen-body-item left">
            <div class="app-title">
              <span>DATOS DE</span>
              <span>CONTACTO</span>
            </div>
            <div class="app-contact">©Rights reserved to Arnold Inc.</div>
          </div>
          <form action="{{ route('userData.store') }}" method="POST">
            @CSRF
            <div class="screen-body-item">
              <div class="app-form">
                <div class="app-form-group">
                  <input class="app-form-control" placeholder="LOCALIDAD" required id="Localidad" name="Localidad">
                </div>
                <div class="app-form-group">
                  <input class="app-form-control" type="number" required placeholder="CODIGO POSTAL" id="CodigoPostal" name="CodigoPostal">
                </div>
                <div class="app-form-group">
                  <input class="app-form-control" type="number" required placeholder="TELEFONO" id="NumeroContacto" name="NumeroContacto">
                </div>
                <div class="app-form-group message">
                  <input class="app-form-control" placeholder="COMENTARIOS" required id="InformacionAdicional" name="InformacionAdicional">
                </div>
                <div class="app-form-group message">
                  <input class="app-form-control" hidden placeholder="UsersID" required id="UsersID" value="{{ auth()->id() }}" name="UsersID">
                </div>
                <div class="app-form-group buttons">
                  <button class="app-form-button">CANCELAR</button>
                  <button class="app-form-button" type="submit">ENVIAR</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>

</body>

</html>