<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fisica</title>
    @vite(['resources/css/game.css'])
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
</head>
<body>
    <div class="contenedor">
        <div class="puntaje" id="puntaje"></div>
        <div class="encabezado">
            <a class="salir" href="/">
                <img class="img" src="icon/flecha-pequena-izquierda.png" alt="Salir al menu de juegos">
            </a>
            <div class="categoria" id="categoria"></div>
            <div class="numero" id="numero"></div>
            <div class="pregunta" id="pregunta"></div>
            <img src="" class="imagen" id="imagen">
            <div class="btn" id="btn1" onclick="oprimir_btn(0)"></div>
            <div class="btn" id="btn2" onclick="oprimir_btn(1)"></div>
            <div class="btn" id="btn3" onclick="oprimir_btn(2)"></div>
            <div class="btn" id="btn4" onclick="oprimir_btn(3)"></div>
        </div>
    </div>
</body>
<script src="{{ asset('js/logica.js') }}"></script>
</html>