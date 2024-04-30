<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/register.css'])
</head>

<body>
    <div class="container">
        <div class="home"><a href="/">Inicio</a></div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 id="title">Registro de usuarios</h1>
            <div class="flexbox">
                <div class="inputbox">
                    <input type="text" name="nickname" required>
                    <label for="">Nickname: </label>
                </div>
                <div class="inputbox">
                    <input type="text" name="email" required>
                    <label for="">Correo: </label>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" required>
                    <label for="">Contraseña:</label>
                </div>
                <div class="register">
                    <button class="btn-register" type="submit" id="singUp">Registrar</button>
                    <button class="btn-registerP" type="button">
                        <a href="{{ route('login') }}">
                            Iniciar Sesion
                        </a>
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
