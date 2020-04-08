function mostrarResultados(id_profesor) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultados").innerHTML = this.responseText;
        }
    };

    var resultado = [];
    resultado[0] = document.getElementById("edad").value;
    resultado[1] = document.getElementById("sexo").value;
    resultado[2] = document.getElementById("cursoalto").value;
    resultado[3] = document.getElementById("cursobajo").value;
    resultado[4] = document.getElementById("matriculas").value;
    resultado[5] = document.getElementById("examenes").value;
    resultado[6] = document.getElementById("interes").value;
    resultado[7] = document.getElementById("tutorias").value;
    resultado[8] = document.getElementById("dificultad").value;
    resultado[9] = document.getElementById("calificacion").value;
    resultado[10] = document.getElementById("asistencia").value;
    resultado[11] = id_profesor;

    xmlhttp.open("GET", "getRespuestas.php?q=" + resultado, true);
    xmlhttp.send();

    // document.getElementById("resultados").innerHTML = resultado;
}
