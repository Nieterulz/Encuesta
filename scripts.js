function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(
                    "txtHint"
                ).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}

function mostrarResultados() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultados").innerHTML = this.responseText;
        }
    };

    var resultado = [];
    resultado[0] = document.getElementById("edad").value;
    resultado[1] = document.getElementById("sexo").value;

    xmlhttp.open("GET", "getRespuestas.php?q=" + resultado, true);
    xmlhttp.send();

    // document.getElementById("resultados").innerHTML = resultado;
}
