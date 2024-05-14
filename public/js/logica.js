


let preguntas_aleatorias = true;
let mostrar_pantalla_juego_términado = true;
let reiniciar_puntos_al_reiniciar_el_juego = true;

window.onload = function () {
    fetch("js/preguntas.json")
        .then((response) => response.json())
        .then((data) => {
            interprete_bp = data;
            escogerPreguntaAleatoria();
        })
        .catch((error) => console.error("Error al leer el JSON:", error));
};

let pregunta;
let posibles_respuestas;
btn_correspondiente = [
    select_id("btn1"),
    select_id("btn2"),
    select_id("btn3"),
    select_id("btn4"),
];
let npreguntas = [];

let preguntas_hechas = 0;
let preguntas_correctas = 0;
let n;

function escogerPreguntaAleatoria() {
    if (preguntas_aleatorias) {
        n = Math.floor(Math.random() * interprete_bp.length);
    } else {
        n = 0;
    }
    while (npreguntas.includes(n)) {
        n++;
        if (n >= interprete_bp.length) {
            n = 0;
        }
    }
    if (preguntas_hechas === 2) {
        pc = preguntas_correctas;
        select_id("inputpuntaje").value = preguntas_correctas;
        //Aquí es donde el juego se reinicia
        if (mostrar_pantalla_juego_términado) {
            swal.fire({
                title: "Juego finalizado Gracias por Jugar, sera redirigido a la pagina principal",
                text:
                    "Puntuación: " +
                    preguntas_correctas +
                    "/" +
                    preguntas_hechas,
                icon: "success",
                showConfirmButton: false, // Oculta el botón de confirmación predeterminado
                showCloseButton: true, // Muestra un botón de cerrar
                html: '<button class="btn btn-puntuacion" id="enviar">Regresar al menu principal</button>', // Agrega un botón personalizado en el pie de página
            })
            document.querySelector('.swal2-close').addEventListener('click', function(){
                document.getElementById('formulario').submit();
            });
            document.getElementById('enviar').addEventListener('click', function(){
                document.getElementById('formulario').submit();
            });
        }
        if (reiniciar_puntos_al_reiniciar_el_juego) {
            preguntas_correctas = 0;
            preguntas_hechas = 0;
        }
        npreguntas = [];
    } else {
        preguntas_hechas++;

        npreguntas.push(n);
        escogerPregunta(n);
    }
}

function escogerPregunta(n) {
    for (const btn of btn_correspondiente) {
        btn.style.display = ""; // Restablecer el estilo display a su valor predeterminado (visible)
    }
    pregunta = interprete_bp[n];
    select_id("categoria").innerHTML = pregunta.categoria;
    select_id("pregunta").innerHTML = pregunta.pregunta;
    select_id("numero").innerHTML = "Pregunta " + n;
    var pc = preguntas_correctas;
    if (preguntas_hechas > 1) {
        select_id("puntaje").innerHTML =
        "Correctas " + pc + " / Preguntas " + (preguntas_hechas - 1);
        select_id("inputpuntaje").value = preguntas_correctas;
    } else {
        select_id("puntaje").innerHTML = "";
    }

    style("imagen").objectFit = pregunta.objectFit;
    desordenarRespuestas(pregunta);
    if (pregunta.imagen) {
        select_id("imagen").setAttribute("src", pregunta.imagen);
        style("imagen").height = "200px";
        style("imagen").width = "60%";
    } else {
        style("imagen").height = "0px";
        style("imagen").width = "0px";
        setTimeout(() => {
            select_id("imagen").setAttribute("src", "");
        }, 500);
    }
}

function desordenarRespuestas(pregunta) {
    posibles_respuestas = [
        pregunta.respuesta,
        pregunta.incorrecta1,
        pregunta.incorrecta2,
        pregunta.incorrecta3,
    ];
    posibles_respuestas.sort(() => Math.random() - 0.5);

    select_id("btn1").innerHTML = posibles_respuestas[0];
    select_id("btn2").innerHTML = posibles_respuestas[1];
    select_id("btn3").innerHTML = posibles_respuestas[2];
    select_id("btn4").innerHTML = posibles_respuestas[3];
}

let suspender_botones = false;

function oprimir_btn(i) {
    if (suspender_botones) {
        return;
    }
    suspender_botones = true;
    if (posibles_respuestas[i] == pregunta.respuesta) {
        preguntas_correctas++;
        btn_correspondiente[i].style.background = "#0807";
        btn_correspondiente[i].style.color = "#fff";
    } else {
        btn_correspondiente[i].style.background = "#a00";
        btn_correspondiente[i].style.color = "#fff";
    }
    for (let j = 0; j < 4; j++) {
        if (posibles_respuestas[j] == pregunta.respuesta) {
            btn_correspondiente[j].style.background = "#0807";
            break;
        }
    }
    setTimeout(() => {
        reiniciar();
        suspender_botones = false;
    }, 3000);
}

function reiniciar() {
    for (const btn of btn_correspondiente) {
        btn.style.background = "";
        btn.style.color = "";
    }
    escogerPreguntaAleatoria();
}

function select_id(id) {
    return document.getElementById(id);
}

function style(id) {
    return select_id(id).style;
}

function readText(ruta_local) {
    var texto = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", ruta_local, false);
    xmlhttp.send();
    if (xmlhttp.status == 200) {
        texto = xmlhttp.responseText;
    }
    return texto;
}

function usarComodin() {
    // Obtener el índice de la respuesta correcta
    let indiceRespuestaCorrecta = obtenerIndiceRespuestaCorrecta();

    // Obtener un arreglo de índices de respuestas incorrectas (excluyendo la respuesta correcta)
    let respuestasIncorrectas = [1, 2, 3].filter(index => index !== indiceRespuestaCorrecta);

    // Elegir aleatoriamente una respuesta incorrecta para ocultar
    let indiceRespuestaOcultar = respuestasIncorrectas[Math.floor(Math.random() * respuestasIncorrectas.length)];

    // Ocultar la respuesta seleccionada
    ocultarRespuesta(indiceRespuestaOcultar);
}

function obtenerIndiceRespuestaCorrecta() {
    // Obtener el índice del botón que contiene la respuesta correcta
    for (let i = 0; i < 4; i++) {
        if (posibles_respuestas[i] === pregunta.respuesta) {
            return i + 1; // Devuelve el índice (1-based) del botón que contiene la respuesta correcta
        }
    }
    return -1; // En caso de no encontrar la respuesta correcta (esto no debería ocurrir)
}

function ocultarRespuesta(indiceRespuesta) {
    // Obtener el botón correspondiente según el índice de respuesta
    let btnOcultar = btn_correspondiente[indiceRespuesta - 1]; // Convertir el índice (1-based) a 0-based

    // Ocultar el botón cambiando su estilo display a "none"
    btnOcultar.style.display = "none";
}