// Variable global que se encarga de almacenar todos los estudiantes de la tabla.
let estudiantes = [];

function agregarEstudiante(event) {

    if($("#estudiante").prop("selectedIndex") === 0){
        alert("Debe seleccionar un estudiante");
    }
    if(validarEstudianteExiste()) {
        alert("El estudiante ya ha sido agregado.");
    }else {
        estudiantes.push({
            idestudiante: $("#estudiante").val(),
            nombrecompleto: $("#estudiante option:selected").text().trim(),
            idgrupo: $("#idgrupo").val()
        });
        mostrarEstudiantes();
    }
}

function mostrarEstudiantes(){
    let contenido = $("#contenido_tabla");
    let data = $("#data");

    // Se limpia la informacion oculta
    data.empty();

    // Se limpia la informacion del contenido de la tabla
    contenido.empty();
    if( estudiantes.length > 0 ) {
        for ( let i = 0; i < estudiantes.length; i++){
            // Se agrega la informacion visual en la tabla
            contenido.append("<tr>");
            contenido.append("<td>" + estudiantes[i].idestudiante + "</tr>");
            contenido.append("<td>" + estudiantes[i].nombrecompleto + "</tr>");
            contenido.append("<td>" + "<a href='#' onclick='eliminarEstudiante(event," + i + ")'>Eliminar</a>" + "</tr>");
            // Se agrega la información oculta que se enviará finalmente al controlador
            data.append("<input type='hidden' name='grupo_estudiantes[" + i + "][idgrupo]' value='" + estudiantes[i].idgrupo + "'/>");
            data.append("<input type='hidden' name='grupo_estudiantes[" + i + "][idestudiante]' value='" + estudiantes[i].idestudiante + "'/>");
            
        }
    } else {
        contenido.append("<tr>");
        contenido.append("<td colspan='3' style='text-align: center'>No hay información.</td>");
        contenido.append("</tr>");
    }
    // se agrega siempre el idgrupo
    data.append("<input type='hidden' name='idgrupo' value='" + $("#idgrupo").val() + "'/>")
}

// Funcion que permite eliminar un estudiante
function eliminarEstudiante(event, index ) {
    event.preventDefault();
    estudiantes.splice(index, 1);
    mostrarEstudiantes();
}

// Funcion que permite validar si un estudiante ya existe

function validarEstudianteExiste() {

    let control = false;
    for ( let i = 0; i < estudiantes.length; i++ ) {
        if ( estudiantes[i].idestudiante === $("#estudiante").val()){
            control = true;
            break;
        }
    }
    return control;
}